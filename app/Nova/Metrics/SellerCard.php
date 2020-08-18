<?php

namespace App\Nova\Metrics;

use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;

use App\Item;

class SellerCard extends Value
{

    public $name = 'Sales';

    /**
     * Calculate the value of the metric.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return mixed
     */
    public function calculate(NovaRequest $request)
    {
        $items = Item::withTrashed()->whereJsonContains('tags', 'Sold')->orWhereJsonContains('tags', 'Selling')->mine();
        $profit = $items->get()->pluck('profit')->sum();
        return $this->result($profit)
          ->dollars()
          ->format('0,0.00')
          ->allowZeroResult()
          ->suffix('Profit');

    }

    /**
     * Get the ranges available for the metric.
     *
     * @return array
     */
    public function ranges()
    {
        return [];
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
        return 'seller-card';
    }
}
