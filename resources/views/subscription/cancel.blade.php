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
        <li>You can resume your subscription by returning to this page before {{ Carbon\Carbon::createFromTimestamp(auth()->user()->subscription()->asStripeSubscription()->current_period_end)->format('D jS F h:ia T') }}</li>
        <li>If you have time, please send an email to <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a> and let us know why you're cancelling. This will help us improve in the future</li>
      </ul>
      If you're sure you want to cancel your subscription, type <b>cancel</b> (lowercase) into the box and click the button.
    </p>
  </div>
  <div class="container text-center">
    @error('cancel')
      <div class="alert alert-danger">You need to type <code>cancel</code> into the box to confirm that you wish to cancel!</div>
    @enderror
    @error('issue')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="/subscription/cancel" method="post" class="form-group">
      @csrf
      <div class="col-6 offset-3">
        <input type="text" class="form-control" placeholder="cancel" id="cancel" name="cancel">
      </div>
      <button type="submit" class="btn btn-lg btn-danger">Cancel my subscription</button>
    </form>
  </div>
@endsection
