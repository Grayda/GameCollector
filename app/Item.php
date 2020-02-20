<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    function acquisition() {
      return $this->hasOne(Acquisition::class)->orderBy('title');
    }
}
