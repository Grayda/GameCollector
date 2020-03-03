<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class CollectionController extends Controller
{
    function view(Request $request, String $uuid) {
      $collection = Collection::where('collection_id', $uuid)->where('public', true)->with(['items', 'owner'])->firstOrFail();

      return view('collections.' . ($collection->layout ?? 'cards'), ['collection' => $collection]);
    }
}
