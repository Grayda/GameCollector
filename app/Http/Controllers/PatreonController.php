<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatreonController extends Controller
{
    // This function handles the incoming Patreon webhook.
    // We're interested in a few things here, namely their
    // email address, how much they've pledged, and what their name is.
    function handleWebhook(Request $request) {
      Storage::disk('local')->put('file.txt', $request->getContent());

      // First, verify that it's a valid message from Patreon.
      if($this->verifyPatreonHash($request) !== true) {
        return false;
      }

      switch($request->header('X-Patreon-Event')) {
        case 'members:pledge:create':
          $this->createUser($request);
        break;
        case 'members:pledge:update':
          $this->updateUser($request);
        break;
        case 'members:pledge:delete':
          $this->deleteUser($request); // Disable, rather than delete
        break;
        default:
          return abort(500);
        break;
      }

    }

    function verifyPatreonHash(Request $request) {
      $patreonBody = $request->getContent(); // This is the raw **body** of the request, which will be JSON (but don't json_decode it!)
      $patreonSignature = $request->header('X-Patreon-Signature'); // And this is the header from Patreon
      $webhookSecret = config('patreon.webhook.secret', null); // This'll be the secret Patreon gave you when you created the webhook
      $webhookHash = hash_hmac('md5', $patreonBody, $webhookSecret); // This is the hash we've calculated, based on the body and the secret

      if(strtolower($webhookHash) == strtolower($patreonSignature)) {
        return true; // Verification succeeded
      } else {
        return false; // Verification failed
      }
    }

    function createUser(Request $request) {
      // First, work out what tier they've pledged to.
      if($request->has('data.attributes.pledge_amount_cents')) {
        $pledge = $request->input('data.attributes.pledge_amount_cents', 0);
        $plan = collect(config('access.tiers'))->sortByDesc('conditions.min-pledge', SORT_NUMERIC)->where('conditions.min-pledge', '<=', $pledge)->first()
      } else {
        abort(400);
      }

      // Then get their user URL
      if($request->has('data.relationships.user.links.related')) {
        $url = $request->input('data.relationships.user.links.related', null);
        $client = new GuzzleHttp\Client();
        $res = $client->get($url);
        echo $res->getBody(); // { "type": "User", ....

      } else {
        abort(400);
      }




    }
}
