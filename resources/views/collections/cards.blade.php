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

      <div class="col-lg-3">
      <div class="card">
        @if($collection->fields['images'] ?? false)
          <img src="{{ $game->getFirstMediaUrl('', 'medium-size') }}" class="card-img-top img-fluid">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{ $game->title }}
            @if($collection->fields['region'] ?? false)
              <small class="text-muted">{{ $game->region->title ?? '' }}</small>
            @endif
          </h5>
          <p class="card-text">
            @if($collection->fields['notes'] ?? false)
              <blockquote class="blockquote">
                {!! Markdown::convertToHtml($game->notes ?? '') !!}<br />
              </blockquote>
            @endif
            <table class="table">
              @if($collection->fields['selling_price'] ?? false)
                <tr>
                  <th>Price:</th>
                  <td>{{ $game->selling_price ?? 'Contact Seller' }} {{ $game->selling_price ? $game->selling_currency_code ?? 'USD' : '' }}</td>
                </tr>
              @endif
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
                    @foreach($game->features as $key => $value)
                      <span class="badge badge-{{ $value == true ? 'success' : 'danger' }}">{{ $key ?? 'n/a' }}</span>
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
                    <table class="table table-borderless">
                        @foreach($game->metadata as $key => $value )
                          <tr>
                            @if(!Str::startsWith($key, '!'))
                              <td>{{ $key }}</td>
                              <td>{{ $value }}</td>
                            @endif
                          </tr>
                        @endforeach
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
