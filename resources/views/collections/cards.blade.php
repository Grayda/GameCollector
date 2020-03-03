@extends('layouts.app')
@section('content')
  <div class="container-fluid">
    <h1 class="display-4">{{ $collection->title }}</h1>
    <p class="lead">A collection of {{ $collection->items->count() }} {{ Str::plural('item', $collection->items->count()) }} by {{ $collection->owner->name ?? 'A User' }}</p>
    <blockquote class="blockquote">{{ $collection->description }}</blockquote>
  </div>
  <div class="container-fluid">
    <div class="row">
    @foreach($collection['items'] as $game)

      <div class="col-3">
      <div class="card">
        @if($collection->fields['images'] ?? false)
          <img src="{{ $game->getFirstMediaUrl('', 'medium-size') }}" class="card-img-top img-fluid">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $game->title }}
            @if($collection->fields['region'] ?? false)
              <small class="text-muted">{{ $game->region->title ?? 'Unknown' }}</small>
            @endif
          </h5>
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
                    @foreach($game->feature_ids as $key => $feature)
                      <span class="badge badge-{{ $feature == true ? 'success' : 'danger' }}">{{ $key ?? 'n/a' }}</span>
                    @endforeach
                  </td>
                </tr>
              @endif
              @if($collection->fields['tags'] ?? false)
                <tr>
                  <th>Tags:</th>
                  <td>
                    @foreach($game->tags as $tag )
                      <span class="badge badge-primary">{{ $tag['text'] ?? 'n/a' }}</span>
                    @endforeach
                  </td>
                </tr>
              @endif
              @if($collection->fields['metadata'] ?? false)
                <tr>
                  <th>Metadata:</th>
                  <td>
                    <table>
                      <tr>
                        <th>Key</th>
                        <th>Value</th>
                      </tr>
                      <tr>
                        @foreach($game->metadata as $key => $value )
                          <td>{{ $key }}</td>
                          <td>{{ $value }}</td>
                        @endforeach
                      </tr>
                    </table>
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
</div>
@endsection
