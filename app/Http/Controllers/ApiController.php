<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Collection;
use App\Item;

class ApiController extends Controller
{
    function getCollections() {
      return Collection::mine()->get();
    }

    function getCollection(String $id) {
      return Collection::mine()->with('items:items.item_id,items.title')->where('collection_id', $id)->get();
    }

    function getItems() {
      return Item::mine()->get();
    }

    function getItem(String $id) {
      return Item::mine()->with(['platform', 'condition', 'region', 'type', 'acquisition', 'collection'])->where('item_id', $id)->get();
    }
}
