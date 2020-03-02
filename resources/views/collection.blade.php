@extends('layout.main')
@section('content')

  <h1 class="display-3">{{ $collection->title }}</h1>
  <p class="lead">A collection of {{ $collection->items->count() }} {{ Str::plural('item', $collection->items->count()) }} by {{ $collection->owner->name ?? 'A User' }}
  <blockquote class="blockquote">{{ $collection->description }}</blockquote>
  <div class="row">
  @foreach($collection['items'] as $game)

    <div class="col-3">
    <div class="card">
      @if($collection->fields['images'] ?? false)
        <img src="{{ $game->getFirstMediaUrl('', 'medium-size') }}" class="card-img-top img-fluid">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $game->title }}</h5>
        <p class="card-text">
          @if($collection->fields['notes'] ?? false)
            <blockquote class="blockquote">
              {{ $game->notes }}<br />
            </blockquote>
          @endif
          <table class="table">
            @if($collection->fields['platform'] ?? false)
              <tr>
                <th>Platform:</th>
                <td>{{ $game->platform->title ?? 'n/a' }}</td>
              </tr>
            @endif
            @if($collection->fields['region'] ?? false)
              <tr>
                <th>Region:</th>
                <td>{{ $game->region->title ?? 'Unknown' }}</td>
              </tr>
            @endif
            @if($collection->fields['type'] ?? false)
              <tr>
                <th>Type:</th>
                <td>{{ $game->type->title ?? 'n/a' }}</td>
              </tr>
            @endif
            @if($collection->fields['condition'] ?? false)
              <tr>
                <th>Condition:</th>
                <td>{{ $game->condition->title ?? 'n/a' }}</td>
              </tr>
            @endif
            @if($collection->fields['features'] ?? false)
              <tr>
                <th>Features:</th>
                <td>
                  <ul>
                    @foreach($game->feature_ids as $key => $feature)
                      {!! $feature == true ? '<li>' . $key . '</li>' : '' !!}
                    @endforeach
                  </ul>
                </td>
              </tr>
            @endif
          </table>
        </p>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
