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
                      <p class="lead">Subscription status: {!! auth()->user()->subscribed() ? '<span class="badge badge-success">Subscribed</span>' : '<span class="badge badge-danger">Not Subscribed</span>' !!}
                      <p class="lead">Plan: {{ auth()->user()->plan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
