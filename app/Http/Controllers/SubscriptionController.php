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
}
