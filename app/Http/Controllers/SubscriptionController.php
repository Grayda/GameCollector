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

    function showSubscribeView(Request $request) {
      return view('subscription.subscribe', [
        'intent' => $request->user()->createSetupIntent()
      ]);
    }

    function subscribe(Request $request) {

      $tiers = collect(config('access.tiers'));

      $request->validate([
        'plan' => 'required|in:' . $tiers->keys()->join(','),
        'payment_method' => 'required|starts_with:pm_'
      ]);

      $user = $request->user();

      $stripeCustomer = $user->createOrGetStripeCustomer();
      $user->updateDefaultPaymentMethod($request->input('payment_method'));
      // If the user has already subscribed, we want to swap, instead of creating a new subscription.
      if($user->subscribed()) {
        $user->subscription('default')->swap($tiers[$request->input('plan')]['id']);
      } else {
        $user->newSubscription('default', $tiers[$request->input('plan')]['id'])->create($request->input('payment_method'));
      }
      $user->plan = $request->input('plan');
      $user->save();
      return redirect('/home')->with('status', 'Plan has been confirmed');
    }

    function cancel(Request $request) {

      $request->validate([
        'cancel' => 'required|in:cancel'
      ]);

      try {
        $request->user()->subscription()->cancel();
      } catch(\Exception $ex) {
        return redirect('/subscription/cancel')->with('issue', 'There was an issue cancelling your subscription. Please contact ' . config('mail.from.address') . ' and include this in your email: ' . $ex->getMessage());
      }

      return redirect('/home');
    }
}
