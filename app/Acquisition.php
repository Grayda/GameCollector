<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acquisition extends Model
{
    function item() {
      return $this->belongsToMany(Item::class);
    }
}
