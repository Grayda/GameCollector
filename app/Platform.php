<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Platform extends Model
{

    use SoftDeletes;

    function items() {
      return $this->hasMany(Item::class);
    }
}
