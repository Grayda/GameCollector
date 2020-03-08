@extends('layouts.app')

@section('content')
  <div class="container-fluid text-center">
    <h1>Get Started with {{ config('app.name') }}</h1>
    <p>So you've finally decided to get your game collection under control? Excellent! Getting started is dead simple.</p>
    <div class="py-3">
      <h2>Step 1: Pledge on Patreon</h2>
      <p class="lead">Access to {{ config('app.name') }} is obtained by pledging on Patreon. Pledging helps pay for the servers that run {{ config('app.name') }}. It also covers the costs of development which in turn allows more features to be added!</p>
      <a href="https://www.patreon.com/signup" class="btn btn-lg btn-success" target="_blank"><i class="fab fa-patreon"></i> Pledge to {{ config('app.name') }}</a>
      <div>
        <small>You may cancel at any time</small>
      </div>
    </div>

    <div class="py-3">
      <h2>Step 2: Log in and start collecting!</h2>
      <p class="lead">Once you've pledged, you'll receive an email from {{ config('app.name') }} asking you to set your password. When that's done, you can log in and start adding items!</p>
    </div>
  </div>
@endsection
