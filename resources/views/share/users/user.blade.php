@extends('layouts.app')
@section('content')
<div class="container-fluid py-4">
    <h1>{{ $user->name }}</h1>
    <h2>Public Collections</h2>
    <div class="container-fluid">
        @foreach($user->collections->where('public', true) as $collection)
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                        {{ $collection->title }}
                      </h5>
                        <p class="card-text">
                            {{ $collection->description }}
                        </p>
                    </div>

                    <div class="card-body">
                        <a href="{{ $collection->url }}">View This Collection</a>
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>
@endsection
