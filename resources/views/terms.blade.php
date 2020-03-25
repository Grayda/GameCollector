@extends('layouts.app')

@section('content')
  <div class="container-fluid py-4">
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
      <p>All payment information is handled by Stripe. You can view their privacy policy here: <a href="">https://stripe.com/privacy</a>. {{ config('app.name') }} stores the last 4 digits of your card to help you know what card you have stored with Stripe</p>
    </a>
  </div>
@endsection
