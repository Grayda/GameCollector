@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1 class="display-4">Get Started with Game Collector</h1>
    <p class="lead">So you're finally ready to sort out your game collection? Great! Let's get started!</p>
    <h1>Fill in some details</h1>
    <p class="lead">We need to know a little bit about you first</p>
</div>
<form method="POST" action="{{ route('register') }}" id="payment-form">
<div class="container text-center pt-4">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="offset-4 col-4">
                <button type="submit" class="btn btn-success btn-lg btn-block">
                    <i class="fas fa-chevron-right"></i> {{ __('Create Account & Pick a Subscription') }}
                </button>
                <small>Already got an account? <a href="/login">Log in</a> instead</small>
            </div>
        </div>
</div>
</form>

@endsection
