<?php

namespace App\Nova\Metrics;

use App\Item;
use App\Acquisition;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Partition;

class CollectionAcquisitionBreakdown extends Partition
{
    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
      return $this->count($request, Item::class, 'acquisition_id')
        ->label(function($value) {
          return Acquisition::where('id', $value)->first()->title;
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
        return 'collection-acquisition-breakdown';
    }
}
