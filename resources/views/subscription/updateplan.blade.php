@extends('layouts.app')

@section('content')
  <form action="/subscription/updateplan" method="post" id="payment-form" name="payment-form">
    @csrf
    <div class="container text-center pt-4">
        <h1>Pick a Plan</h1>
        <p class="lead">Plans start at $2 USD. Pick one that suits your needs best. You can change plans or cancel at any time</p>
        <div class="form-group">
          @include('partials.plans')
          <div class="row pt-5">
            <div class="col-6 offset-3">
              <button type="submit" class="btn btn-success btn-lg btn-block" id="card-button">
                @if(auth()->user()->subscribed())
                  {{ __('Update') }}
                @else
                  {{ __('Confirm') }}
                @endif
              </button>
            </div>
          </div>
        </div>
    </div>
  </form>

@endsection
