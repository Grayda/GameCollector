<div class="row">
  @foreach(collect(config('access.tiers'))->where('selectable') as $key => $tier)
    <div class="col">
        <div class="subscription-option">
            @if($active ?? true)
              <input class="{{ $key }}" type="radio" id="{{ $key }}" name="plan" value="{{ $key }}" {{ auth()->user()->plan == $key ? 'checked' : '' }} {{ auth()->user()->plan == "none" && $tier['default'] ? 'checked' : '' }}>
            @endif
            <label for="{{ $key }}">
                <span class="plan-icon"><i class="{{ $tier['icon'] }}"></i></span>
                <span class="plan-price">${{ $tier['price'] }} <small>/month</small></span>
                <span class="plan-trial">+{{ $tier['trial'] }} day trial</span>
                <span class="plan-name">{{ $tier['name'] }}</span>
                <span class="plan-description">
                  <b>Items:</b> {{ $tier['limit'] < 0 ? 'Unlimited' : $tier['limit'] }}<br />
                  <b>Collections:</b> {{ $tier['collection_limit'] < 0 ? 'Unlimited' : $tier['collection_limit'] }}<br />
                  <b>Photos:</b> {{ $tier['photos'] ? 'Yes' : 'No' }} @if($tier['photo_limit'] > 0) ({{ $tier['photo_limit'] }} per item) @elseif($tier['photo_limit'] == -1) (Unlimited) @endif
                </span>
            </label>
        </div>
    </div>
  @endforeach
</div>
