<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Select;

use App\Acquisition;

class MarkItemAsSold extends Action
{
    use InteractsWithQueue, Queueable;

    /**
     * Perform the action on the given models.
     *
     * @param  \Laravel\Nova\Fields\ActionFields  $fields
     * @param  \Illuminate\Support\Collection  $models
     * @return mixed
     */
    public function handle(ActionFields $fields, Collection $models)
    {
      foreach($models as $item) {
        $item->tags = $item->tags->reject(function($tag) {
          return $tag == 'Selling';
        })->add('Sold')
          ->unique()
          ->values();
        $item->sold_method_id = $fields->method;
        $item->sold_price = $fields->sold_price;
        $item->sold_at = now();
        $item->save();
        $item->delete();
      }
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [
          Select::make('Method')
            ->options(Acquisition::pluck('title', 'id'))
            ->nullable()
            ->help('Where was this item sold?'),
          Currency::make('Sold Price')
            ->nullable()
            ->help('How much did this item sell for?'),
        ];
    }
}
