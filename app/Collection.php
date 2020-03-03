<?php

namespace App;

use Illuminate\Support\Str;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends Model
{

    use Userstamps;
    use SoftDeletes;

    protected $casts = [
      'public' => 'boolean',
      'fields' => 'array'
    ];

    function __construct() {
      $this->attributes['collection_id'] = Str::uuid(); // Because we can't do functions in variable declarations outside of a function.
    }

    function items() {
      return $this->belongsToMany(Item::class);
    }

    function owner() {
      return $this->hasOne(User::class, 'id');
    }
}
