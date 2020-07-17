<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\User;

class ShareController extends Controller
{
    function viewCollection(Request $request, String $uuid) {
      $request->validate([
        'layout' => 'in:cards,list'
      ]);

      $collection = Collection::withTrashed()->where('collection_id', $uuid)->where('public', true)->with(['items', 'owner'])->firstOrFail();

      if(!empty($request->query('layout'))) {
        $collection->layout = $request->query('layout');
      }

      return view('share.collections.' . ($collection->layout ?? 'cards'), ['collection' => $collection]);
    }

    function viewUser(Request $request, String $uuid) {

      $user = User::where('user_id', $uuid)->with(['collections'])->firstOrFail();

      return view('share.users.user', ['user' => $user]);
    }
}
