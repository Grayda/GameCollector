@extends('layouts.app')

@push('stripe-card')
  <script src="https://js.stripe.com/v3/"></script>
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
@endpush
@section('content')
  <div class="container text-center">
    <h1 class="display-3">Get Started with Game Collector</h1>
    <p class="lead">So you're finally ready to sort out your game collection? Great! Let's get started!</p>
    <h1>Fill in some details</h1>
    <p class="lead">We need to know a little bit about you first</p>
  </div>
  <div class="container text-center pt-4">
    <form method="POST" action="{{-- {{ route('register') }} --}}">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>
      </div>

      <div class="container text-center pt-4">
        <h1>Pick a Plan</h1>
        <p class="lead">Plans start at $2 USD. Pick one that suits your needs best. You can change plans or cancel at any time</p>
        <div class="form-group">
            <div class="row">
                <div class="col-4">

                    <div class="subscription-1 subscription-option">
                        <input type="radio" id="plan-bronze" name="plan" value="casual-gamer">
                        <label for="plan-bronze">
                            <span class="plan-icon"><i class="fas fa-mobile"></i></span>
                            <span class="plan-price">$2 <small>/mo</small></span>
                            <span class="plan-name">Casual Gamer</span>
                            <span class="plan-description">100 Items</span>
                        </label>
                    </div>

                </div>
                <div class="col-4">

                    <div class="subscription-2 subscription-option">
                        <input type="radio" id="plan-silver" name="plan" value="hardcore-gamer" checked>
                        <label for="plan-silver">
                            <span class="plan-icon"><i class="fas fa-gamepad"></i></span>
                            <span class="plan-price">$5 <small>/mo</small></span>
                            <span class="plan-name">Hardcore Gamer</span>
                            <span class="plan-description">500 Items + Photos</span>
                        </label>
                    </div>

                </div>
                <div class="col-4">

                    <div class="subscription-3 subscription-option">
                        <input type="radio" id="plan-gold" name="plan" value="completionist">
                        <label for="plan-gold">
                            <span class="plan-icon"><i class="fas fa-trophy"></i></span>
                            <span class="plan-price">$10 <small>/mo</small></span>
                            <span class="plan-name">Completionist</span>
                            <span class="plan-description">Unlimited Items + Photos</span>
                        </label>
                    </div>

                </div>
            </div>
        </div>
      </div>
      <div class="container text-center pt-4">
        <h1>Add a Payment</h1>
        <p class="lead">Payments are handled by Stripe, so your details are secure</p>

        <div class="form-group row">
            <label for="card-element" class="col-md-4 col-form-label text-md-right">
              {{ __('Credit or Debit Card') }}
            </label>
            <div class="col-md-6">
               <div class="form-control" id="card-element"></div>
             </div>
             <div>
               <!-- Used to display Element errors -->
               <span id="card-errors" role="alert"></span>
             </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
  </div>
  @stack('stripe-card')
@endsection
