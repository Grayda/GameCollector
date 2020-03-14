<div class="row">
  @foreach(collect(config('access.tiers'))->where('selectable') as $key => $tier)
    <div class="col">
        <div class="subscription-option">
            <input class="{{ $key }}" type="radio" id="{{ $key }}" name="plan" value="{{ $key }}" @if(auth()->user()->plan == $key) checked @else {{ $tier['default'] ? 'checked' : '' }} @endif>
            <label for="{{ $key }}">
                <span class="plan-icon"><i class="{{ $tier['icon'] }}"></i></span>
                <span class="plan-price">${{ $tier['price'] }} <small>/mo</small></span>
                <span class="plan-name">{{ $tier['name'] }}</span>
                <span class="plan-description">{{ $tier['limit'] < 0 ? 'Unlimited' : $tier['limit'] }} Items {{ $tier['photos'] ? ' + Photos' : '' }}</span>
            </label>
        </div>
    </div>
  @endforeach
</div>
