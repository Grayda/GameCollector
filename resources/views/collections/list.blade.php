@extends('layouts.app')
@section('content')
  <div class="container-fluid">
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
              <small class="text-muted">{{ $game->region->title ?? 'Unknown' }}</small>
            @endif
          </td>
          @if($collection->fields['platform'] ?? false)
            <td>
              <strong>Platform:</strong><br />
              {{ $game->platform->title ?? 'n/a' }}
            </td>
          @endif
          @if($collection->fields['notes'] ?? false)
            <td>
              <strong>Notes:</strong><br />
              {{ $game->notes }}
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
              @foreach($game->feature_ids as $key => $feature)
                <span class="badge badge-{{ $feature == true ? 'success' : 'danger' }}">{{ $key ?? 'n/a' }}</span>
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
          </tr>
          @endforeach
        </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection