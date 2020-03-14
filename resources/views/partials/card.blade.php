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
@stack('card-javascript')

@push('card-javascript')
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
