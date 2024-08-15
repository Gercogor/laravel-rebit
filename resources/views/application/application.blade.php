@extends('layouts.app')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>success!</strong>
            <div>
                {{ session('success') }}
            </div>
        </div>
    @endif
    <form method="POST" action="{{ route('store') }}">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="middle_name">Middle Name:</label>
            <input type="text" name="middle_name" id="middle_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="text">Application Text:</label>
            <textarea name="text" id="text" class="form-control" rows="5" required></textarea>
        </div>
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </div>
    </form>

@endsection
