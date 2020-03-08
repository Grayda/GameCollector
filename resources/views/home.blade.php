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

                    Welcome {{ auth()->user()->name }}!
                    <div>
                      <a href="/collect" class="btn btn-primary">Go to your items</a>
                      <a href="https://patreon.com/gamecollector" class="btn btn-secondary">Go to Patreon</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
