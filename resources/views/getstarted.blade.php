@extends('layouts.app')

@section('content')
  <div class="container-fluid text-center">
    <h1>Get Started with {{ config('app.name') }}</h1>
    <p>So you've finally decided to get your game collection under control? Excellent! Getting started is dead simple.</p>
    <div class="py-3">
      <h2>Step 1: Sign up for Patreon</h2>
      <p>Access to {{ config('app.name') }} is obtained via Patreon. When you pledge, {{ config('app.name') }} is notified and an account is created for you.</p>
      <a href="https://www.patreon.com/signup" class="btn btn-lg btn-primary" target="_blank"><i class="fab fa-patreon"></i> Go to Patreon</a>
    </div>
    <div class="py-3">
      <h2>Step 2: Pledge on Patreon</h2>
      <p>Pledging helps pay for the servers that run {{ config('app.name') }}. It also covers the costs of development which in turn gives {{ config('app.name') }} even more features</p>
      <a href="https://www.patreon.com/signup" class="btn btn-lg btn-success" target="_blank"><i class="fas fa-heart"></i> Pledge to {{ config('app.name') }}</a>
    </div>

    <div class="py-3">
      <h2>Step 3: Log in and start collecting!</h2>
      <p>Once you've pledged, you'll receive an email from Game Collector asking you to set your password. When that's done, you can log in and start adding items!</p>
    </div>
  </div>
@endsection
