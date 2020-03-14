@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <h1>User Dashboard</h1>
  </div>
  <div class="row">
    <h2>Subscription Status</h2>
    <table class="table table-bordered">
      <tr>
        <th>Plan</th>
        <td>{{ auth()->user()->user_plan['plan']['name'] }}</td>
        <td><a href="/subscription/update">Change</a></td>
      </tr>
      <tr>
        <th>Status</th>

        @if(auth()->user()->subscription('default')->onGracePeriod())
          <td>
            <div class="badge badge-warning">Cancelling</div>
          </td>
          <td>
            <a href="/subscription/cancel">Resume Subscription</a>
          </td>
        @elseif(auth()->user()->subscription('default')->ended())
          <td>
            <div class="badge badge-danger">Cancelled</div>
          </td>
          <td>
            <a href="/subscription/subscribe">Re-Subscribe</a>
          </td>
        @elseif(auth()->user()->subscribed() && !auth()->user()->subscription('default')->onGracePeriod())
          <td>
            <div class="badge badge-success">Subscribed</div>
          </td>
          <td>
            <a href="/subscription/cancel">Cancel Subscription</a>
          </td>
        @endif
        </td>
      </tr>
      <tr>
          @if(auth()->user()->subscription('default')->onGracePeriod())
            <th>
              Plan will end on
            </th>
            <td>
              {{ auth()->user()->subscription()->ends_at->format('D jS F Y \a\t h:ia T') }}
            </td>
          @elseif(auth()->user()->subscription('default')->ended())
            <th>
              Plan ended on
            </th>
            <td>
              {{ auth()->user()->subscription()->ends_at->format('D jS F Y \a\t h:ia T') }}
            </td>
          @elseif(auth()->user()->subscribed() && !auth()->user()->subscription('default')->onGracePeriod())
            <th>
              Next renewal date
            </th>
            <td>
              {{ Carbon\Carbon::createFromTimestamp(auth()->user()->subscription()->asStripeSubscription()->current_period_end)->format('D jS F Y h:ia T') }}
            </td>
          @endif
          <td></td>
        </tr>
        <tr>
          <th>Usage</th>
          <td><b>{{ auth()->user()->items()->count() }} / {{ auth()->user()->user_plan['plan']['limit'] }}</b> items, <b>{{ auth()->user()->collections()->count() }} / {{ auth()->user()->user_plan['plan']['collection_limit'] }}</b> collections{!! auth()->user()->user_plan['plan']['photos'] ? ', <b>Photo upload enabled</b>' : '' !!}</td>
          <td></td>
        </tr>
    </table>
  </div>
  <div class="row">
    <h2>User Information</h2>
    <table class="table table-bordered">
      <tr>
        <th>Name</th>
        <td>{{ auth()->user()->name }}</td>
        <td><a href="/collect/resources/users/{{ auth()->user()->id }}/edit">Edit</a></td>
      <tr />
    </table>
  </div>
</div>
@endsection
