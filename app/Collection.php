<?php

namespace App;

use Illuminate\Support\Str;
use Wildside\Userstamps\Userstamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collection extends BaseModel
{

    use Userstamps;
    use SoftDeletes;

    protected $casts = [
      'public' => 'boolean',
      'fields' => 'array'
    ];

    protected $attributes = [
      'layout' => 'cards'
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
        'selling_price' => false,
      ]);

      parent::__construct();
    }

    function items() {
      return $this->belongsToMany(Item::class);
    }

    function owner() {
      return $this->hasOne(User::class, 'id', 'created_by');
    }

    // Gets your own items.
    // If you're not logged in, returns nothing.
    // If you're logged in, returns just yours, unless you're
    // an admin, in which case it'll show everything.
    public function scopeMine($query) {
      if(!auth()->user()) {
        return null;
      } else {
          if(auth()->user()->is_admin) {
            return $query;
          } else {
            return $query->where('created_by', auth()->user()->id);
          }
      }
    }

    public function getUrlAttribute() {
      return route('share:collection', ['id' => $this->attributes['collection_id']]);
    }
}
