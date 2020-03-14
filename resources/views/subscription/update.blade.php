@extends('layouts.app')

@section('content')
  <form action="/subscription/subscribe" method="post" id="payment-form" name="payment-form">
    @csrf
    <div class="container text-center pt-4">
        <h1>Pick a Plan</h1>
        <p class="lead">Plans start at $2 USD. Pick one that suits your needs best. You can change plans or cancel at any time</p>
        <div class="form-group">
          @yield('partials.plans')
        </div>
    </div>

    <div class="container text-center">
      <h1>Add a payment method</h1>
      <p class="lead">Credit cards are securely handled by Stripe and your card details are never stored with {{ config('app.name') }}</p>

      @yield('partials.card')
    </div>
  </form>

@endsection
