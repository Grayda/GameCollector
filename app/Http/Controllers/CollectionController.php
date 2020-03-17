<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class CollectionController extends Controller
{
    function view(Request $request, String $uuid) {
      $request->validate([
        'layout' => 'in:cards,list'
      ]);

      $collection = Collection::where('collection_id', $uuid)->where('public', true)->with(['items', 'owner'])->firstOrFail();

      if(!empty($request->query('layout'))) {
        $collection->layout = $request->query('layout');
      }

      return view('collections.' . ($collection->layout ?? 'cards'), ['collection' => $collection]);
    }
}
