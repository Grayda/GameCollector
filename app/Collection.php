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
      $this->attributes['fields'] = json_encode([ // Even though fields is cast to an array, we need to json_encode it here for some reason.
        'images' => true,
        'notes' => false,
        'condition' => true,
        'region' => true,
        'tags' => false,
        'type' => true,
        'features' => true,
        'metadata' => false,
      ]);

      parent::__construct();
    }

    function items() {
      return $this->belongsToMany(Item::class);
    }

    function owner() {
      return $this->hasOne(User::class, 'id');
    }
}
