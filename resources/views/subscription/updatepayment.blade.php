@extends('layouts.app')

@section('content')
  <div class="container">
    @isset($success)
      <div class="alert alert-success">{{ $success }}</div>
    @endisset
    <form action="/subscription/updatepayment" method="post" id="payment-form" name="payment-form" class="form-group">
      @csrf
      <div class="container text-center">
        <h1>Update Payment Method</h1>
        <p class="lead">Credit cards are securely handled by Stripe and your card details are never stored with {{ config('app.name') }}</p>
        <p class="lead">Current card on file: {{ Str::title(auth()->user()->card_brand ?? "Unknown") }} {{ str_repeat("*", 23) . auth()->user()->card_last_four ?? "xxxx" }}</p>
        @include('partials.card')
        <div class="row pt-5">
          <div class="col-6 offset-3">
            <button type="submit" class="btn btn-success btn-lg btn-block" id="card-button" data-secret="{{ $intent->client_secret }}">
              @if(auth()->user()->subscribed())
                {{ __('Update') }}
              @else
                {{ __('Confirm') }}
              @endif
            </button>
          </div>
        </div>

      </div>
    </form>
  </div>

@endsection
