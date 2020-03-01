<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;

class CollectionController extends Controller
{
    function view(String $uuid) {
      return view('collection', ['collection' => Collection::where('collection_id', $uuid)->where('public', true)->with(['items', 'owner'])->firstOrFail()]);
    }
}
