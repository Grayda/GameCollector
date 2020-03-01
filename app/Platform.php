<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    function items() {
      return $this->hasMany(Item::class);
    }
}
