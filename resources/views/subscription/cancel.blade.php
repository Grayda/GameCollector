@extends('layouts.app')

@section('content')
  <div class="container text-center">
    <h1>Cancel your subscription</h1>
    <p class="lead">We're sorry to see you go, but it is what it is. Here's what you need to know about cancelling:</p>
  </div>
  <div class="container">
    <p class="lead">
      <ul>
        <li>Your subscription will continue until {{ Carbon\Carbon::createFromTimestamp(auth()->user()->subscription()->asStripeSubscription()->current_period_end)->format('D jS F h:ia T') }}</li>
        <li>When your subscription ends, we'll keep your items for 6 months. Be sure to download your items if you want to keep them!</li>
      </ul>
    </p>

  </div>
@endsection
