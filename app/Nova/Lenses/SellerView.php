<?php

namespace App\Nova\Lenses;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BooleanGroup;
use Laravel\Nova\Fields\Currency;
use Superlatif\NovaTagInput\Tags;
use Laravel\Nova\Http\Requests\LensRequest;
use Laravel\Nova\Lenses\Lens;

use App\Nova\Metrics\SellerCard;

class SellerView extends Lens
{
    /**
     * Get the query builder / paginator for the lens.
     *
     * @param  \Laravel\Nova\Http\Requests\LensRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return mixed
     */
    public static function query(LensRequest $request, $query)
    {
        return $request->withOrdering($request->withFilters(
            $query
              ->mine()
              ->withTrashed()
              ->whereJsonContains('tags', 'Sold')
              ->orWhereJsonContains('tags', 'Selling')
              // ->orderByRaw('CASE WHEN tags LIKE \'%Selling%\' THEN 1 ELSE 2 END') // Sort by Selling tag first
        ));
    }

    /**
     * Get the fields available to the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make('ID', 'id')->sortable()
              ->hideFromIndex(),
            Text::make('Title')->sortable()
              ->detailLink(),
            BelongsTo::make('Platform')
              ->withoutTrashed()
              ->defaultLast()
              ->sortable()
              ->help('What platform is this item for?'),
            BelongsTo::make('Region')
              ->nullable()
              ->withoutTrashed()
              ->defaultLast()
              ->hideFromIndex()
              ->sortable()
              ->help('What region this item is from'),
            BelongsTo::make('Type')
              ->withoutTrashed()
              ->defaultLast()
              ->sortable()
              ->help('What type of item is this?'),
            BelongsTo::make('Condition')
              ->nullable()
              ->withoutTrashed()
              ->sortable()
              ->help('What condition is this item in?'),
            BooleanGroup::make('Included Items', 'feature_ids')->options(\App\Feature::pluck('title', 'slug')),
            Currency::make('Total Purchase Price')->nullable(),
            Currency::make('Selling Price')
              ->nullable(),
            Currency::make('Sold Price')
              ->nullable(),
            Tags::make('Tags'),
            Currency::make('Potential Profit'),
            Currency::make('Profit')

        ];
    }

    /**
     * Get the cards available on the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [
          (new SellerCard)->help('Shows you how much you\'ve made selling items by deducting purchase price from sold price. An item must be tagged \'Selling\' or \'Sold\' to be displayed')
        ];
    }

    /**
     * Get the filters available for the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
          new \App\Nova\Filters\SoldFilter,
          new \App\Nova\Filters\TypeFilter,
          new \App\Nova\Filters\ConditionFilter,
          new \App\Nova\Filters\RegionFilter,
          new \App\Nova\Filters\PlatformFilter,
          new \App\Nova\Filters\ImageFilter,
        ];
    }

    /**
     * Get the actions available on the lens.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return parent::actions($request);
    }

    /**
     * Get the URI key for the lens.
     *
     * @return string
     */
    public function uriKey()
    {
        return 'seller-view';
    }
}
