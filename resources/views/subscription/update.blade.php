@extends('layouts.app')

@section('content')
  <script src="https://js.stripe.com/v3/"></script>
  <script>

  </script>
  <div class="container">
    <h1>Change your subscription</h1>
    <p>If you wish to change your subscription, you can do so here. You'll be charged or refunded the difference</p>
    <form action="/subscription/update" method="post" id="payment-form">
      @csrf
      <div class="form-group">
        <label for="card-element">
          Credit or debit card
        </label>
        <div>
           <div class="form-control" id="card-element"></div>
         </div>
         <div>
           <!-- Used to display Element errors -->
           <span id="card-errors" role="alert"></span>
         </div>
      </div>

      <button>Submit Payment</button>
    </form>

    <script>
      (function() {
        var stripe = Stripe('{{ config('cashier.key') }}');
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        var style = {
          base: {
            // Add your base input styles here. For example:
            fontSize: '16px',
            color: '#32325d',
          },
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

      })()
    </script>
  </div>
@endsection
