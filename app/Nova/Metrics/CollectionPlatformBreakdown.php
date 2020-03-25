<?php

namespace App\Nova\Metrics;

use App\Item;
use App\Platform;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;

class CollectionPlatformBreakdown extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
      return $this->count($request, Item::mine(), 'platform_id')
        ->label(function($value) {
          return optional(Platform::where('id', $value)->first())->title ?? 'n/a';
        });
    }

    /**
     * Determine for how many minutes the metric should be cached.
     *
     * @return  \DateTimeInterface|\DateInterval|float|int
     */
    public function cacheFor()
    {
        // return now()->addMinutes(5);
    }

    /**
     * Get the URI key for the metric.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'collection-platform-breakdown';
    }
}
