@extends('layouts.app')

@section('content')
  <div class="container text-center py-4">
    <h1>Get Started with {{ config('app.name') }}</h1>
    <p>So you've finally decided to get your game collection under control? Excellent! There are two ways to get started:</p>
    <div class="row">
      <div class="col-6">
        <h2>Do It Yourself</h2>
        <p>{{ config('app.name') }} is open source software built with Laravel and Laravel Nova, so you can run it yourself, providing you have a valid Laravel Nova license</p>
        <p><a href="https://github.com/grayda/gamecollector" class="btn btn-lg btn-secondary"><i class="fab fa-github"></i> View on GitHub</a></p>
      </div>
      <div class="col-6">
        <h2>Use our servers</h2>
        <p>Don't want to, or can't set up your own server? Use ours! Plans start at $2 a month. See the <a href="/pricing">pricing</a> page for more info</p>
        <a href="/register" class="btn btn-lg btn-success" target="_blank"><i class="fas fa-gamepad"></i> Get started in minutes!</a>
        <div>
          <small>You may cancel at any time</small>
        </div>
      </div>
    </div>

  </div>
@endsection
