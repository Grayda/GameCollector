<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

use App\Collection as ItemCollection;

use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Select;

class MarkItemForSale extends Action
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
          return $tag == 'Sold';
        })->add('Selling')
          ->unique()
          ->values();
        $item->selling_price = $fields->selling_price;
        $item->sold_price = null;
        $item->sold_at = null;
        $item->collection()->syncWithoutDetaching($fields->collection);
        $item->restore(); // Undelete if already deleted
        $item->save();
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
          Select::make('Collection')
            ->options(ItemCollection::where('created_by', auth()->user()->id)->pluck('title', 'id'))
            ->help('(Optional) pick a collection containing your items for sale'),
          Currency::make('Selling Price')
            ->nullable()
            ->help('How much are you selling this for?'),
        ];
    }
}
