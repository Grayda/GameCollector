<div id="carousel-{{ $images->first()->id }}" class="carousel slide" data-interval="false">
  <ol class="carousel-indicators">
    @foreach($images as $key => $image)
      <li data-target="#carousel-{{ $images->first()->id }}" data-slide-to="{{ $key }}" class="@if($loop->first) active @endif"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach($images as $image)
      <div class="carousel-item @if($loop->first) active @endif">
        <img src="{{ $image->getUrl('medium-size') }}" class="d-block w-100 img-fluid" alt="">
        @if($image->getCustomProperty('description') ?? null)
          <div class="carousel-caption d-none d-md-block">
            <p> {{ $image->getCustomProperty('description') ?? null }}</p>
          </div>
        @endif
      </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carousel-{{ $images->first()->id }}" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel-{{ $images->first()->id }}" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
