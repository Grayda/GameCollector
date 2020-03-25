@extends('layouts.app')
@section('content')
  <div class="card card-body bg-light">
    @include('partials.edittoolbar', ['id' => $collection->id, 'type' => 'collection'])
  </div>
  <div class="container-fluid py-4">
    <h1 class="display-4">{{ $collection->title }}</h1>
    <p class="lead">A collection of {{ $collection->items->count() }} {{ Str::plural('item', $collection->items->count()) }} by {{ $collection->owner->name ?? 'A User' }}</p>
    <blockquote class="blockquote">{{ $collection->description }}</blockquote>
  </div>
  <div class="container-fluid">
    <div class="row">
      <table class="table table-striped">
        @foreach($collection['items'] as $game)
          <tr>
          @if($collection->fields['images'] ?? false)
            <td><img src="{{ $game->getFirstMediaUrl('', 'medium-size') }}" class="item-img img-fluid"></td>
          @endif
          <td>
            <strong>Title / Region:</strong><br />
            {{ $game->title }}
            @if($collection->fields['region'] ?? false)
              <small class="text-muted">{{ $game->region->title ?? '' }}</small>
            @endif
          </td>
          @if($collection->fields['selling_price'] ?? false)
            <td>
              <strong>Price:</strong><br />
              {{ $game->selling_price ?? 'Contact Seller' }} {{ $game->selling_currency_code ?? 'USD' }}
            </td>
          @endif
          @if($collection->fields['platform'] ?? false)
            <td>
              <strong>Platform:</strong><br />
              {{ $game->platform->title ?? 'n/a' }}
            </td>
          @endif
          @if($collection->fields['notes'] ?? false)
            <td>
              <strong>Notes:</strong><br />
              {!! Markdown::convertToHtml($game->notes ?? '') !!}<br />
            </td>
          @endif
          @if($collection->fields['type'] ?? false)
            <td>
              <strong>Item Type:</strong><br />
              {{ $game->type->title ?? 'n/a' }}
            </td>
          @endif
          @if($collection->fields['condition'] ?? false)
            <td>
              <strong>Condition:</strong><br />
              {{ $game->condition->title ?? 'n/a' }}
            </td>
          @endif
          @if($collection->fields['features'] ?? false)
            <td>
              <strong>Features:</strong><br />
              @foreach($game->features as $key => $value)
                <span class="badge badge-{{ $value == true ? 'success' : 'danger' }}">{{ $key ?? 'n/a' }}</span>
              @endforeach
            </td>
          @endif
          @if($collection->fields['tags'] ?? false)
            <td>
              <strong>Tags:</strong><br />
              @foreach($game->tags as $tag )
                <span class="badge badge-primary">{{ $tag['text'] ?? 'n/a' }}</span>
              @endforeach
            </td>
          @endif
          @if($collection->fields['metadata'] ?? false)
              <td>
                <strong>Metadata:</strong><br />
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
          @endif
            <td>
              @include('partials.edittoolbar', ['id' => $game->id, 'type' => 'item'])
            </td>
          </tr>
          @endforeach
        </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
