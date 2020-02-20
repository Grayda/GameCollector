<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    function acquisition() {
      return $this->belongsTo(Acquisition::class)->orderBy('title');
    }

    function condition() {
      return $this->belongsTo(Condition::class)->orderBy('grade', 'desc');
    }

    function item() {
      return $this->belongsTo(Item::class);
    }

}
