@extends('layouts.app')

@section('content')
  <div class="container text-center">
    <h1>Resume your subscription</h1>
    <p class="lead">We're glad to see you again. Click the button below and your subscription will be resumed.</p>
  </div>
  <div class="container text-center">
    @error('issue')
      <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <form action="/subscription/resume" method="post" class="form-group">
      @csrf
      <button type="submit" class="btn btn-lg btn-success">Resume my subscription</button>
    </form>
  </div>
@endsection
