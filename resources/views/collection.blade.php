@extends('layout.main')
@section('content')

  <h1 class="display-3">{{ $collection->title }}</h1>
  <p class="lead">A collection of {{ $collection->items->count() }} {{ Str::plural('item', $collection->items->count()) }} by {{ $collection->owner->name ?? 'A User' }}
  <blockquote class="blockquote">{{ $collection->description }}</blockquote>

  <div class="row">
  @foreach($collection['items'] as $game)
    <div class="col-3">
    {{ $game->getFirstMediaUrl() }}
    <div class="card">
      <img src="{{ $game->getMedia('')[0]->getUrl('medium-size') }}" class="card-img-top img-fluid">
      <div class="card-body">
        <h5 class="card-title">{{ $game->title }}</h5>
        <p class="card-text">
          <table class="table">
            <tr>
              <th>Platform:</th>
              <td>{{ $game->platform->title ?? 'n/a' }}</td>
            </tr>
            <tr>
              <th>Type:</th>
              <td>{{ $game->type->title ?? 'n/a' }}</td>
            </tr>
            <tr>
              <th>Condition:</th>
              <td>{{ $game->condition->title ?? 'n/a' }}</td>
            </tr>
            <tr>
              <th>Included Items:</th>
              <td>
                <ul>
                  @foreach($game->feature_ids as $key => $feature)
                    {!! $feature == true ? '<li>' . $key . '</li>' : '' !!}
                  @endforeach
                </ul>
              </td>
            </tr>
          </table>
        </p>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
