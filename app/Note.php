<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Note extends Model
{

  use Userstamps;
  use SoftDeletes;

  protected $casts = [
    'metadata' => 'array',
  ];

  function item() {
    return $this->belongsTo(Item::class);
  }

}
