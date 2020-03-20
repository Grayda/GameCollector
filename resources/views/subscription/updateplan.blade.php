@extends('layouts.app')

@section('content')
  <form action="/subscription/updateplan" method="post" id="payment-form" name="payment-form">
    @csrf
    <div class="container text-center pt-4">
        <h1>Pick a Plan</h1>
        <p class="lead">If you change your plan, you will be prorated accordingly, and a line will appear on your invoice. Changes to your plan take place immediately.</p>
        <div class="form-group">
          @include('partials.plans', ['active' => true])
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
