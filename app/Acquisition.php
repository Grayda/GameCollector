<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acquisition extends Model
{
    function items() {
      return $this->belongsToMany(Item::class);
    }
}
