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

    protected $attributes = [
        'purchase_price' => 0,
    ];

    protected $fillable = [
      'platform_id'
    ];

    public static function getTagClassName(): string
    {
      return Tag::class;
    }

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
        ->width(130)
        ->height(130);

      $this->addMediaConversion('medium-size')
        ->width(800);

    }

}
