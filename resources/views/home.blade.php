@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="lead">Welcome {{ auth()->user()->name }}!</p>
                    <div>
                      <p class="lead">Subscription status: <span class="badge badge-{{ auth()->user()->subscribed() ? 'success' : 'danger' }}">{{ auth()->user()->subscribed() ? 'Subscribed' : 'Not Subscribed' }}
                      <p class="lead">Plan: {{ config('access.tiers.' . auth()->user()->plan)['name'] ?? 'None' }}</p>
                      @if(auth()->user()->subscription('default')->hasIncompletePayment())
                        <p class="lead text-danger">Your last payment was not completed!</p>
                        <p class="lead">
                          <a href="{{ route('cashier.payment', auth()->user()->subscription()->latestPayment()->id) }}">
                            Please confirm your payment.
                          </a>
                        </p>
                      @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
