<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $ipAddresses = explode(',', env('FILTER_IP_ADDRESSES'));

        $applications = Application::with('contact')
            ->when($request->filled('ip_address'), function ($query) use ($request) {
                $query->where('ip_address', $request->input('ip_address'));
            })
            ->when(!empty($ipAddresses), function ($query) use ($ipAddresses) {
                $query->whereIn('ip_address', $ipAddresses);
            })
            ->paginate(10);

        return view('applications.index', compact('applications'));
    }

    public function store(Request $request)
    {
        $contact = Contact::create($request->only(['first_name', 'last_name', 'middle_name']));

        $application = new Application();
        $application->text = $request->input('text');
        $application->ip_address = $request->ip();
        $application->contact_id = $contact->id;
        $application->save();

        dispatch(new LogApplicationJob($application));

        return redirect('/')->with('success', 'Application submitted successfully.');
    }
}
