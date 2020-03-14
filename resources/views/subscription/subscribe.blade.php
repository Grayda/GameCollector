@extends('layouts.app')
@push('stripe-card')
<script src="https://js.stripe.com/v3/"></script>
<script>

    function stripeIntentHandler(setupIntent) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'payment_method');
      hiddenInput.setAttribute('value', setupIntent.payment_method);
      form.appendChild(hiddenInput);

      // Submit the form
      form.submit();
    }

    window.onload = function() {
        var stripe = Stripe('{{ config('cashier.key') }}');
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                color: '#32325d',
            },
        };

        // Create an instance of the card Element.
        var cardElement = elements.create('card', {
            style: style
        });
        // Add an instance of the card Element into the `card-element` <div>.
        cardElement.mount('#card-element');

        var cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        var form = document.getElementById('payment-form');
        var clientSecret = cardButton.dataset.secret;

        form.addEventListener('submit', async (e) => {
            console.dir('Prevented')
            e.preventDefault()

            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );
            const displayError = document.getElementById('card-errors');
            if (error) {
                displayError.textContent = error.message;
            } else {
              stripeIntentHandler(setupIntent)
            }
        });

    }
</script>
@endpush

@section('content')
  <form action="/subscription/subscribe" method="post" id="payment-form" name="payment-form">
    @csrf
    <div class="container text-center pt-4">
        <h1>Pick a Plan</h1>
        <p class="lead">Plans start at $2 USD. Pick one that suits your needs best. You can change plans or cancel at any time</p>
        <div class="form-group">
            <div class="row">
              @foreach(collect(config('access.tiers'))->where('selectable') as $key => $tier)
                <div class="col">
                    <div class="subscription-option">
                        <input class="{{ $key }}" type="radio" id="{{ $key }}" name="plan" value="{{ $key }}" @if(auth()->user()->plan == $key) checked @else {{ $tier['default'] ? 'checked' : '' }} @endif>
                        <label for="{{ $key }}">
                            <span class="plan-icon"><i class="{{ $tier['icon'] }}"></i></span>
                            <span class="plan-price">${{ $tier['price'] }} <small>/mo</small></span>
                            <span class="plan-name">{{ $tier['name'] }}</span>
                            <span class="plan-description">{{ $tier['limit'] < 0 ? 'Unlimited' : $tier['limit'] }} Items {{ $tier['photos'] ? ' + Photos' : '' }}</span>
                        </label>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>

    <div class="container text-center">
      <h1>Add a payment method</h1>
      <p class="lead">Credit cards are securely handled by Stripe and your card details are never stored with {{ config('app.name') }}</p>

      <div class="row text-left">
        <div class="col-2 offset-3">
          <label for="card-element" class="col-form-label">
            {{ __('Cardholder Name') }}
          </label>
        </div>
        <div class="col-4">
          <input id="card-holder-name" type="text" class="form-control" value="{{ auth()->user()->name }}">
        </div>
      </div>
      <div class="row text-left">
        <div class="col-2 offset-3">
          <label for="card-element" class="col-form-label">
            {{ __('Credit or Debit Card') }}
          </label>
        </div>
        <div class="col-4">
          <div class="form-control" id="card-element"></div>
        </div>
        <div id="card-errors"></div>
      </div>
      <div class="row pt-5">
        <div class="col-6 offset-3">
          <button type="submit" class="btn btn-success btn-lg btn-block" id="card-button" data-secret="{{ $intent->client_secret }}">
            @if(auth()->user()->subscribed())
              {{ __('Update Subscription') }}
            @else
              {{ __('Start Subscription') }}
            @endif
          </button>
        </div>
      </div>
    </div>
  </form>
@stack('stripe-card')
@endsection
