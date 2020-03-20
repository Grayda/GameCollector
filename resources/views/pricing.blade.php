@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Game Collector Pricing</h1>
    <p class="lead">Game Collector has {{ collect(config('access.tiers'))->where('selectable')->count() }} plans available, with different limits</p>
    <p>@include('partials.plans', ['active' => false])</p>
</div>
@endsection
