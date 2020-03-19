@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Game Collector Pricing</h1>
    <p>Game Collector has {{ collect(config('access.tiers'))->where('selectable')->count() }} plans available, with different limits</p>
    <p>
    <div class="row">
        @foreach(collect(config('access.tiers'))->where('selectable') as $key => $tier)
            <div class="col">
                <div class="subscription-option">
                    <label for="{{ $key }}">
                    <span class="plan-icon"><i class="{{ $tier['icon'] }}"></i></span>
                    <span class="plan-price">${{ $tier['price'] }} <small>/month</small></span>
                    <span class="plan-name">{{ $tier['name'] }}</span>
                    <span class="plan-description">
                      <b>Items:</b> {{ $tier['limit'] < 0 ? 'Unlimited' : $tier['limit'] }}<br />
                      <b>Collections:</b> {{ $tier['collection_limit'] < 0 ? 'Unlimited' : $tier['collection_limit'] }}<br />
                      <b>Photos:</b> {{ $tier['photos'] ? 'Yes' : 'No' }}
                    </span>
                </label>
                </div>
            </div>
            @endforeach
    </div>
</div>
@endsection
