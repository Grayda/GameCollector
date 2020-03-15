<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    function showUpdatePlanView(Request $request) {
      return view('subscription.updateplan', [
        'intent' => $request->user()->createSetupIntent()
      ]);
    }

    function updatePlan(Request $request) {
      $tiers = collect(config('access.tiers'));

      $request->validate([
        'plan' => 'required|in:' . $tiers->keys()->join(','),
      ]);

      $request->user()->subscription()->swap(config('access.tiers.' . $request->input('plan') . '.id'));
      $request->user()->plan = $request->input('plan');
      $request->user()->save();

      return view('home')->with('success', 'Plan updated');

    }

    function showUpdatePaymentView(Request $request) {
      return view('subscription.updatepayment', [
        'intent' => $request->user()->createSetupIntent()
      ]);
    }

    function updatePayment(Request $request) {
      $request->validate([
        'payment_method' => 'required|starts_with:pm_'
      ]);

      $request->user()->updateDefaultPaymentMethod($request->input('payment_method'));

      return view('home')->with('success', 'Payment method updated');

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
        $user->newSubscription('default', $tiers[$request->input('plan')]['id'])->create($request->input('payment_method'), [
          'name' => $user->name
        ]);
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

    function downloadInvoice(Request $request, $invoice) {
      return $request->user()->downloadInvoice($invoice, [
          'vendor' => 'davidgray Photography',
          'product' => config('app.name'),
      ]);
    }
}
