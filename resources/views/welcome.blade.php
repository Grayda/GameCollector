@extends('layouts.app')
@section('content')
  <div class="text-center">
    <div class="jumbotron jumbotron-fluid">
      <h1 class="display-1 text-center">{{ config('app.name') }}</h1>
      <h2 class="text-center">Manage Your Game Collection</h2>
    </div>
    <div class="container mb-5">
      <h3 class="display-4">Rein in your games</h3>
      <p class="lead">Games everywhere? Not sure what you have? Details stored in a spreadsheet on your computer? It's time to rein in your video games with {{ config('app.name') }}! {{ config('app.name') }} is a web app designed to help you catalogue your video game collection. Store purchase details, photos, item conditions, regions, and almost any other information you want, then search for it no matter where you are.</p>
      <hr />
      <div class="row text-center align-items-center">
        <div class="col"><img src="/site-images/n64-1000.png" class="img-fluid"></div>
        <div class="col">
          <h3 class="display-5">Catalogue Everything</h3>
          <p class="lead">{{ config('app.name') }} lets you add almost anything you have. Loose NES cartridge? Check! Scale model of the Nebuchadnezzar from The Matrix? Check! Promotional poster for Animal Crossing? Check! Add them all, then effortlessly sort and search!</p>
        </div>
      </div>
      <br />
      <div class="row text-center align-items-center">
        <div class="col">
          <h3 class="display-5">Details That Matter</h3>
          <p class="lead">Not all items in your collection are equal. Some are factory sealed, some are missing chunks of plastic or have torn labels. With {{ config('app.name') }} you can keep track of purchase details, item condition, region, extra items such as boxes and manuals as well as arbitrary info like CD keys, serial numbers and any other text you like</p>
        </div>
        <div class="col"><img src="/site-images/fds-zelda-300.png" class="img-fluid"></div>
      </div>
      <br />
      <div class="row text-center align-items-center">
        <div class="col"><img src="/site-images/collection-500.jpg" class="img-fluid"></div>
        <div class="col">
          <h3 class="display-5">Show 'em what you've got</h3>
          <p class="lead">Once you've added your items, you can group them into public or private collections. You can make collections for all your Nintendo games, or items you've got for sale, or games you've completed. It's all up to you. You even get to choose what fields are shown, so if you don't want people to see your private notes, just untick the box</p>
        </div>
      </div>
      <br />
      <div class="row text-center align-items-center">
        <div class="col">
          <h3 class="display-5">Pics or it didn't happen</h3>
          <p class="lead">It's easy enough to describe an item, but sometimes you need to see it to get it. You can upload photos of your entire collection to {{ config('app.name') }} and know exactly what you mean when the condition is listed as "Good"</p>
        </div>
        <div class="col"><img src="/site-images/photos-500.jpg" class="img-fluid"></div>
      </div>
    </div>
    <div class="py-4 bg-dark text-light">
      <h1>Yes!</h1>
    </div>
  </div>
@endsection
