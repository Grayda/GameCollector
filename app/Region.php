<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends Model
{

    use SoftDeletes;

    public function items() {
      return $this->hasMany(Item::class);
    }

}
