@extends('layouts.app')

@section('title', 'Invoices')
@section('content')

  <div class="container">
    <h1>Invoices</h1>
    <p class="lead">You have {{ auth()->user()->invoices()->count() }} invoices available</p>
    <table class="table table-bordered">
      @foreach(auth()->user()->invoices() as $invoice)
        <tr>
            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
            <td>{{ $invoice->total() }}</td>
            <td><a href="/subscription/invoices/download/{{ $invoice->id }}">Download</a></td>
        </tr>
      @endforeach
    </table>
@endsection
