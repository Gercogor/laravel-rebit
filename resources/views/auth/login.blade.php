@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('error'))
            <div class="alert alert-danger">
                <strong>Error!</strong>
                <div>
                    {{ session('error') }}
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="username">{{ __('Email Address') }}</label>
                                <input id="username" name="username" class="form-control"
                                       placeholder="admin">
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input type="password" id="password" name="password" class="form-control"
                                       placeholder="Password">
                            </div>

                            <button type="submit" class="btn btn-primary mt-1">{{ __('Login') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
