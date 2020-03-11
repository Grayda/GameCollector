<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    function showUpdateView(Request $request) {
      return view('subscription.update', [
        'intent' => $request->user()->createSetupIntent()
      ]);
    }

    function update(Request $request) {
      dd($request);
    }

    function cancel(Request $request) {
      $request->validate([
        'confirm' => 'required|accepted'
      ]);
    }
}
