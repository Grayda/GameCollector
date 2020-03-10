<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model implements HasMedia
{
    use HasMediaTrait;
    use Userstamps;
    use SoftDeletes;

    protected $casts = [
      'metadata' => 'array',
      'acquired_at' => 'date',
      'feature_ids' => 'array',
      'tags' => 'array'
    ];

    protected $attributes = [
        'purchase_price' => 0,
    ];

    protected $fillable = [
      'platform_id'
    ];

    function acquisition() {
      return $this->belongsTo(Acquisition::class)->orderBy('title');
    }

    function condition() {
      return $this->belongsTo(Condition::class)->orderBy('grade', 'desc');
    }

    function collection() {
      return $this->belongsToMany(Collection::class)->orderBy('title');
    }

    function platform() {
      return $this->belongsTo(Platform::class)->orderBy('title', 'desc')->orderBy('manufacturer', 'desc');
    }

    function type() {
      return $this->belongsTo(Type::class)->orderBy('title', 'desc');
    }

    function region() {
      return $this->belongsTo(Region::class);
    }

    public function registerMediaCollections()
    {
      $this->addMediaCollection('item_images');
    }

    public function registerMediaConversions(Media $media = null)
    {
      $this->addMediaConversion('thumb')
        ->width(130)
        ->height(130);

      $this->addMediaConversion('medium-size')
        ->width(800);

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

}
