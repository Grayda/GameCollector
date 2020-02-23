<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
  function items() {
    return $this->belongsToMany(Item::class);
  }
}
