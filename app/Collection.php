<?php

namespace App;

use Illuminate\Support\Str;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{

    use Userstamps;

    protected $casts = [
      'public' => 'boolean',
      'fields' => 'array'
    ];

    function __construct() {
      $this->attributes['collection_id'] = Str::uuid(); // Because we can't do functions in variable declarations outside of a function.
      $this->attributes['fields'] = json_encode([
        'notes' => false,
        'condition' => true,
        'region' => true,
        'tags' => false,
        'type' => true,
        'images' => true,
        'features' => true
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
