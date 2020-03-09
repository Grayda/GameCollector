@extends('layouts.app')

@section('content')
  <div class="container text-center">
    <h1>Get Started with {{ config('app.name') }}</h1>
    <p>So you've finally decided to get your game collection under control? Excellent! There are two ways to get started:</p>
    <div class="row">
      <div class="col-6">
        <h2>Host it yourself</h2>
        <p>{{ config('app.name') }} is open source software built with Laravel and Laravel Nova, so you can run it yourself, providing you have a valid Laravel Nova license</p>
        <p><a href="https://github.com/grayda/gamecollector" class="btn btn-lg btn-secondary"><i class="fab fa-github"></i> View the code on GitHub</a></p>
      </div>
      <div class="col-6">
        <h2>Use our servers</h2>
        <p>If you just want to use the website without messing around with hosting and licenses, then pledge on Patreon to get immediate access to the website</p>
        <a href="https://www.patreon.com/gamecollector" class="btn btn-lg btn-success" target="_blank"><i class="fab fa-patreon"></i> Pledge to {{ config('app.name') }}</a>
        <div>
          <small>You may cancel at any time</small>
        </div>
      </div>
    </div>

  </div>
@endsection
