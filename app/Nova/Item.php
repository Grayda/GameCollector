<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\BooleanGroup;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;

use Spatie\TagsField\Tags;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

use Laravel\Nova\Http\Requests\NovaRequest;

class Item extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Item';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The group in which this resource belongs to.
     *
     * @var string
     */
    public static $group = 'Items';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title',
        'platform',
        'type',
        'condition',
        'metadata'
    ];

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(NovaRequest $request, $query)
    {
        if($request->user()->is_admin === true) {
          return $query;
        } else {
          return $query->where('created_by', $request->user()->id);
        }
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()
              ->sortable()
              ->hideFromIndex(),
            Heading::make('Item Details'),
            Text::make('Title')
              ->sortable()
              ->withMeta([
                'extraAttributes' => [
                  'placeholder' => 'Super Mario Bros. 3',
                ],
              ]),
            BelongsTo::make('Platform')
              ->withoutTrashed()
              ->sortable()
              ->help('What platform is this item for?'),
            BelongsTo::make('Region')
              ->nullable()
              ->hideFromIndex()
              ->help('What region this item is from'),
            BelongsTo::make('Type')
              ->withoutTrashed()
              ->sortable()
              ->help('What type of item is this?'),
            Heading::make('Acquisition Details'),
            Date::make('Date Acquired', 'acquired_at')
              ->nullable()
              ->help('When was this item acquired?'),
            BelongsTo::make('Acquisition Method', 'acquisition', 'App\Nova\Acquisition')
              ->withoutTrashed()
              ->hideFromIndex()
              ->help('How was this item acquired?'),
            Currency::make('Purchase Price')
              ->nullable()
              ->help('How much did you pay for this item?'),
            Heading::make('Item Condition'),
            BelongsTo::make('Condition')
              ->withoutTrashed()
              ->hideFromIndex()
              ->help('What condition is this item in?'),
            BooleanGroup::make('Included Items', 'feature_ids')->options(\App\Feature::pluck('title', 'title')),
            BelongsTo::make('Related Item', 'parent', Item::class)
              ->nullable()
              ->hideFromDetail()
              ->hideFromIndex()
              ->help('Specifies if an item belongs to another item'),
            Number::make('Related items', function() {
              return $this->parent()->count() + $this->children()->count();
            })
              ->sortable()
              ->onlyOnIndex(),
            HasOne::make('Parent Item', 'parent', Item::class),
            HasMany::make('Child Item', 'children', Item::class),
            Heading::make('Additional Information'),
            Markdown::make('Notes')
              ->alwaysShow(),
            Tags::make('Tags')
              ->help('Extra tags to add to the item'),
            KeyValue::make('Metadata')
              ->help('Store additional metadata here, such as serial numbers, CD keys etc.'),
            Images::make('Images', 'item_images')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [
          new DownloadExcel,
        ];
    }
}
