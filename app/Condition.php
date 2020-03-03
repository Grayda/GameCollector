<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Condition extends Model
{

  use SoftDeletes;

  function items() {
    return $this->belongsToMany(Item::class);
  }
}
