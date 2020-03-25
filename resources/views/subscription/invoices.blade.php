@extends('layouts.app')

@section('title', 'Invoices')
@section('content')

  <div class="container py-4">
    <h1>Invoices</h1>
    <p class="lead">You have {{ auth()->user()->invoicesIncludingPending()->count() }} invoices available</p>
    <table class="table table-bordered">
      <tr>
        <th>Date</th>
        <th>Amount</th>
        <th>Download Link</th>
      </tr>
      @foreach(auth()->user()->invoicesIncludingPending() as $invoice)
        <tr>
            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
            <td>{{ $invoice->total() }}</td>
            <td><a href="/subscription/invoices/download/{{ $invoice->id }}">Download</a></td>
        </tr>
      @endforeach
    </table>
@endsection
