<?php

namespace App\Http\Controllers;

use App\Jobs\LogApplicationJob;
use App\Models\Application;
use App\Models\Contact;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $ipv4Regex = '/^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/';
        $ipAddress = '';
        if (preg_match($ipv4Regex, $request->ip_address)) {
            $ipAddress = $request->ip_address;
        }
        $applications = Application::with('contact')
            ->when($ipAddress, function ($query) use ($ipAddress) {
                $query->where('ip_address', $ipAddress);
            })
            ->paginate(10);

        return view('application.index', compact('applications'));
    }

    public function store(Request $request)
    {
        $contact = Contact::firstOrCreate($request->only(['first_name', 'last_name', 'middle_name']));

        $application = new Application();
        $application->text = $request->input('text');
        $application->ip_address = $request->ip();
        $application->contact_id = $contact->id;
        $application->save();

        dispatch(new LogApplicationJob($application));

        return redirect('/application')->with('success', 'Application submitted successfully.');
    }

    public function create()
    {
        return view('application.application');
    }
}
