@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <h1>Terms of Service</h1>

    <p>You may use {{ config('app.name') }} to:</p>
    <ul>
      <li>Store and share information about game or multimedia-related items you own</li>
      <li>Store and share information about game or multimedia-related items wish to own (wishlist)</li>
      <li>Store and share photos relating to your collection, such as photos of cartridges, scans of manuals, and so on</li>
    </ul>

    <p>You may NOT use {{ config('app.name') }} to:</p>
    <ul>
      <li>Store or share inappropriate or illegal content</li>
      <li>Intimidate, harrass, or otherwise make others feel uncomfortable</li>
    </ul>

    <p>{{ config('app.name') }} may:</p>
    <ul>
      <li>Occasionally check user data to ensure it conforms to the terms of service</li>
      <li>Use user-uploaded images in promotional material.
        <ul>
          <li>You will be notified when this occurs</li>
          <li>Personally identifiable information will be removed or obfuscared</li>
        </ul>
      </li>
    </ul>

    <a id="privacy">
      <h1>Privacy</h1>
      <p>{{ config('app.name') }} uses the name and email address you provide to Patreon in order to create an account for you. {{ config('app.name') }} may use Google Analytics to further improve the site. No other information is collected by {{ config('app.name') }}</p>
    </a>
  </div>
@endsection
