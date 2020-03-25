@extends('layouts.app')

@section('content')
  <div class="container py-4">
    <h1>Game Collector Help</h1>
    <h3>Table of Contents</h3>

    <h4>About {{ config("app.name") }}</h4>
    <ul>
      <li>What is {{ config("app.name") }}</li>
      <li>Is {{ config("app.name") }} open source?</li>
      <li>How much does it cost?</li>
    </ul>

    <h4>Items</h4>
    <ul>
      <li>What is an item?</li>
      <li>Can I attach photos to items?</li>
      <li>Can I import items from another site or app?</li>
    </ul>

    <h4>Collections</h4>
    <ul>
      <li>What is a collection?</li>
    </ul>

    <div>
      <hr />
      <h3>About {{ config('app.name') }}</h3>

      <h4>What is {{ config('app.name') }}?</h4>
      <p>{{ config('app.name') }} is a web app that lets you manage your video game collection. With it you can add items and group them into collections. You can add details such as notes, metadata (e.g. CD keys, serial numbers), acquisition information such as where you bought the item, how much it cost etc.</p>

      <h4>Is {{ config('app.name') }} open source?</h4>
      <p>Yes! You can view the code on <a href="https://github.com/grayda/gamecollector">GitHub</a>. You will need a Laravel Nova license to use it however.</p>

      <h4>How much does it cost?</h4>
      <p>{{ config('app.name') }} has three plans: Casual Gamer, Hardcore Gamer, and Completionist. Each one offers something different:</p>
      <table class="table">
        <tr>
          <th>Plan Name</th>
          <th>Cost</th>
          <th>Items</th>
          <th>Collections</th>
          <th>Photos</th>
        </tr>
        <tr>
          <td>Casual Gamer</td>
          <td>$2 USD per month</td>
          <td>Up to 100</td>
          <td>Up to 10</td>
          <td>No</td>
        </tr>
        <tr>
          <td>Hardcore Gamer</td>
          <td>$5 USD per month</td>
          <td>Up to 500</td>
          <td>Up to 50</td>
          <td>Yes</td>
        </tr>
        <tr>
          <td>Completionist</td>
          <td>$10 USD per month</td>
          <td>Unlimited</td>
          <td>Unlimited</td>
          <td>Yes</td>
        </tr>
      </table>

      <p>The money you pay goes towards covering server and development costs</p>

      <h3>Items</h3>

      <h4>What is an item?</h4>
      <p>An item is something you wish to track. It can be an actual game, an empty box, an accessory such as a controller, or even a collectible like an Amiibo or movie poster</p>

    </div>

  </div>
@endsection
