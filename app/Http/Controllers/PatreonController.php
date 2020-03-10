<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatreonController extends Controller
{
    // This function handles the incoming Patreon webhook.
    // We're interested in a few things here, namely their
    // email address, how much they've pledged, and what their name is.
    function handleWebhook(Request $request) {
      Storage::disk('local')->put('file.txt', $request->all());
      
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
          return false;
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
    }
}
