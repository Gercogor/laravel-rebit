@extends('layouts.app')

@section('content')
    @if (session()->has('warning'))
        <div class="alert alert-warning">
            <strong>Logout</strong>
            <div>
                {{ session('warning') }}
            </div>
        </div>
    @else
        <div class="text-center">
            start page
        </div>
    @endif
@endsection
