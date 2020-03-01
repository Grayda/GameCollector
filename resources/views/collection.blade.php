@extends('layout.main')
@section('content')

  <h1 class="display-3">{{ $collection->title }}</h1>
  <p class="lead">A collection of {{ $collection->items->count() }} {{ Str::plural('item', $collection->items->count()) }} by {{ $collection->owner->name ?? 'A User' }}
  <blockquote class="blockquote">{{ $collection->description }}</blockquote>

  <div class="row">
  @foreach($collection['items'] as $game)
    <div class="col">
    {{ $game->getFirstMediaUrl() }}
    <div class="card w-50">
      <img src="{{ $game->getFirstMediaUrl('') }}" class="card-img-top img-fluid">
      <div class="card-body">
        <h5 class="card-title">{{ $game->title }}</h5>
        <p class="card-text">
          Type: {{ $game->type->title ?? 'n/a' }}<br />
          Platform: {{ $game->platform->title ?? 'n/a' }}<br />
        </p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
