<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wildside\Userstamps\Userstamps;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use \Spatie\Tags\HasTags;

class Item extends Model implements HasMedia
{
    use HasMediaTrait;
    use Userstamps;
    use HasTags;

    protected $casts = [
      'metadata' => 'array',
      'acquired_at' => 'date',
      'feature_ids' => 'array'
    ];

    function acquisition() {
      return $this->belongsTo(Acquisition::class)->orderBy('title');
    }

    function condition() {
      return $this->belongsTo(Condition::class)->orderBy('grade', 'desc');
    }

    function platform() {
      return $this->belongsTo(Platform::class)->orderBy('title', 'desc')->orderBy('manufacturer', 'desc');
    }

    function type() {
      return $this->belongsTo(Type::class)->orderBy('title', 'desc');
    }

    function parent() {
      return $this->belongsTo(Item::class);
    }

    function children() {
      return $this->hasMany(Item::class, 'parent_id');
    }

    function getRelatedAttribute($value) {
      $parents = $this->parent;
      $children = $this->children;

      return $parents->merge($children);
    }

    public function registerMediaCollections()
    {
      $this->addMediaCollection('item_images');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
              ->width(320)
              ->height(240);

        $this->addMediaConversion('medium-size')
              ->width(800)
              ->height(600);
    }

}
