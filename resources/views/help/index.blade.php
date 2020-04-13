@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <h1>Game Collector Help</h1>
    <h2 class="pt-3">Table of Contents</h3>

    <h4 class="pt-3">About {{ config("app.name") }}</h4>
    <ul>
      <li>What is {{ config("app.name") }}</li>
      <li>Is {{ config("app.name") }} open source?</li>
      <li>How much does it cost?</li>
    </ul>

    <h4 class="pt-3">Items</h4>
    <ul>
      <li>What is an item?</li>
      <li>Can I attach photos to items?</li>
      <li>Can I import items from another site or app?</li>
      <li>What are tags and metadata?</li>
      <li>What are the seller tools?</li>
    </ul>

    <h4 class="pt-3">Collections</h4>
    <ul>
      <li>What is a collection?</li>
    </ul>

    <div>
      <h2>About {{ config('app.name') }}</h3>

      <h4 class="pt-3">What is {{ config('app.name') }}?</h4>
      <p>{{ config('app.name') }} is a web app that lets you manage your video game collection. With it you can add items and group them into collections. You can add details such as notes, metadata (e.g. CD keys, serial numbers), acquisition information such as where you bought the item, how much it cost etc.</p>

      <h4 class="pt-3">Is {{ config('app.name') }} open source?</h4>
      <p>Yes! You can view the code on <a href="https://github.com/grayda/gamecollector">GitHub</a>. You will need a Laravel Nova license to use it however.</p>

      <h4 class="pt-3">How much does it cost?</h4>
      <p>{{ config('app.name') }} has {{ collect(config('access.tiers'))->where('selectable')->count() }} plans. Each one offers something different:</p>
      <table class="table">
        <tr>
          <th></th>
          <th>Plan Name</th>
          <th>Cost</th>
          <th>Items</th>
          <th>Collections</th>
          <th>Photos</th>
          <th>Trial</th>
        </tr>
        @foreach(collect(config('access.tiers'))->where('selectable')->values() as $plan)
          <tr>
            <th><i class="{{ $plan['icon'] ?? '' }}"></i></th>
            <td>{{ $plan['name'] }}</td>
            <td>${{ $plan['price'] }} USD per month</td>
            <td>{{ $plan['limit'] >= 0 ? 'Up to ' . $plan['limit'] : 'Unlimited' }}</td>
            <td>{{ $plan['collection_limit'] >= 0 ? 'Up to ' . $plan['collection_limit'] : 'Unlimited' }}</td>
            <td>{{ $plan['photos'] ? 'Yes' : 'No' }} @if($plan['photo_limit'] > 0) ({{ $plan['photo_limit'] }} per item) @elseif($plan['photo_limit'] == -1) (Unlimited) @endif </td>
            <td>{{ $plan['trial'] != false ? $plan['trial'] . ' days' : 'No' }}</td>
          </tr>
        @endforeach
      </table>

      <p>The money you pay goes towards covering server and development costs</p>

      <h2>Items</h3>

      <h4 class="pt-3">What is an item?</h4>
      <p>An item is something you wish to track. It can be an actual game, an empty box, an accessory such as a controller, or even a collectible like an Amiibo or movie poster</p>

      <h4 class="pt-3">Can I attach photos to an item?</h4>
      <p>If you're on a plan that has photo uploads enabled ({{ collect(config('access.tiers'))->where('selectable')->where('photos')->pluck('name')->join(', ', ' and ') }}) then you can upload photos. How many photos you can add to each item depends on your plan.</p>
      <p>Each file must be smaller than {{ ini_get('upload_max_filesize') }} and the total image size must be smaller than {{ ini_get('post_max_size') }}</p>

      <h4 class="pt-3">Can I import items from another site or app?</h4>
      <p>This feature is still being built. Contact <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a> if you have a large collection you wish to be imported.</p>

      <h4 class="pt-3">What are tags and metadata?</h4>
      <p>Tags offer you a way to note something about an item. For example you can tag an item as "Collector's Edition" so when you browse your items, you can see at a glance which ones are collector's editions. {{ config('app.name') }} comes with a few suggested tags, such as "Selling" or "Wishlist", but you can use whatever tags you like</p>
      <p>Metadata allows you to store arbitrary details as key / value pairs with your items. So instead of using the note fields to store things like CD keys or serial numbers, you can use the metadata field and set the key to "Serial Number" and the value to "1234567890"</p>
      <p>When you search in {{ config('app.name') }}, it also searches metadata and tags</p>

      <h4 class="pt-3">What are the seller tools?</h4>
      <p>This feature is still being built. Contact <a href="mailto:{{ config('mail.from.address') }}">{{ config('mail.from.address') }}</a> if you have a large collection you wish to be imported.</p>
    </div>

  </div>
@endsection
