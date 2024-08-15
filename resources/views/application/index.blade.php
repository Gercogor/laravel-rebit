@extends('layouts.app')

@section('content')
    <h1 class="text-center">All Applications</h1>

    <form method="GET" action="{{ route('applications.index') }}">
        <label for="ip_address" class="form-label">Filter by IP Address:</label>
        <input type="text" name="ip_address" id="ip_address" class="form-control" value="{{ request('ip_address') }}">
        <button type="submit" class="btn btn-primary mt-2">Filter</button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Text</th>
            <th scope="col">IP Address</th>
            <th scope="col">Contact</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($applications as $application)
            <tr>
                <td scope="row">{{ $application->id }}</td>
                <td>{{ $application->text }}</td>
                <td>{{ $application->ip_address }}</td>
                <td>{{ $application->contact->first_name }} {{ $application->contact->last_name }}</td>
                <td>{{ $application->created_at }}</td>
                <td>{{ $application->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $applications->links() }}

@endsection
