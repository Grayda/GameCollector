<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\HasOne;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\KeyValue;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\BooleanGroup;
use Laravel\Nova\Fields\Boolean;

use Eminiarts\Tabs\Tabs;
use Eminiarts\Tabs\TabsOnEdit;

use Grayda\NovaPlanCard\NovaPlanCard;

use App\Nova\Actions\AddToCollection;

use Ebess\AdvancedNovaMediaLibrary\Fields\Images;

use Superlatif\NovaTagInput\Tags;
use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
use Titasgailius\SearchRelations\SearchesRelations;

use Laravel\Nova\Http\Requests\NovaRequest;

class Item extends Resource
{

    use SearchesRelations;
    use TabsOnEdit;

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
        'metadata',
        'notes',
        'tags'
    ];

    /**
     * The relationship columns that should be searched.
     *
     * @var array
     */
    public static $searchRelations = [
        'condition' => ['title'],
        'region' => ['title'],
        'type' => ['title'],
        'platform' => ['title']
    ];

    /**
     * Hides a resource from the sidebar if you don't have access.
     * Still show the resources on the form, but just hides the nav
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     */
    public static function availableForNavigation(Request $request)
    {
      return true;
    }

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
            (new Tabs('Details', [
              'Basic Details' => [
                ID::make()
                  ->sortable()
                  ->hideFromIndex(),
                Text::make('Title')
                  ->sortable()
                  ->required()
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
                  ->sortable()
                  ->help('What region this item is from'),
                BelongsTo::make('Type')
                  ->withoutTrashed()
                  ->sortable()
                  ->help('What type of item is this?'),
                BelongsTo::make('Condition')
                  ->nullable()
                  ->withoutTrashed()
                  ->sortable()
                  ->help('What condition is this item in?'),
                BooleanGroup::make('Included Items', 'feature_ids')->options(\App\Feature::pluck('title', 'title')),

              ],
              'Acquisition Details' => [
                Date::make('Date Acquired', 'acquired_at')
                  ->nullable()
                  ->hideFromIndex()
                  ->help('When was this item acquired?'),
                BelongsTo::make('Acquisition Method', 'acquisition', 'App\Nova\Acquisition')
                  ->nullable()
                  ->hideFromIndex()
                  ->withoutTrashed()
                  ->hideFromIndex()
                  ->sortable()
                  ->help('How was this item acquired?'),
                Currency::make('Purchase Price')
                  ->nullable()
                  ->hideFromIndex()
                  ->sortable()
                  ->help('How much did you pay for this item?'),
                Select::make('Currency', 'purchase_currency_code')
                  ->options(config('currencies'))
                  ->displayUsingLabels()
                  ->rules('in:' . collect(config('currencies'))->keys()->join(','))
                  ->help('The currency this item is selling / sold in'),
              ],
              'Seller Details' => [
                Heading::make('This tab should be used if you\'re intending to sell this item.')
                  ->onlyOnForms(),
                Date::make('Date Sold', 'sold_at')
                  ->nullable()
                  ->hideFromIndex()
                  ->help('If this item has sold, when did it sell?'),
                BelongsTo::make('Sell Method', 'sold_method', 'App\Nova\Acquisition')
                  ->nullable()
                  ->withoutTrashed()
                  ->hideFromIndex()
                  ->sortable()
                  ->help('Where was this item sold?'),
                Currency::make('Selling Price')
                  ->nullable()
                  ->hideFromIndex()
                  ->sortable()
                  ->help('How much are you selling this item for?'),
                Currency::make('Sold Price')
                  ->nullable()
                  ->hideFromIndex()
                  ->sortable()
                  ->help('How much did this item sell for?'),
                Select::make('Currency', 'selling_currency_code')
                  ->options(config('currencies'))
                  ->displayUsingLabels()
                  ->rules('in:' . collect(config('currencies'))->keys()->join(','))
                  ->help('The currency this item is selling / sold in'),
                Heading::make('Don\'t forget to tag your item with the \'Selling\' tag!')
                  ->onlyOnForms()
              ],
              'Additional Information' => [
                Markdown::make('Notes')
                  ->nullable()
                  ->help('Notes about this item')
                  ->alwaysShow(),
                Markdown::make('Private Notes')
                  ->nullable()
                  ->help('Private notes. These are NEVER shown in collections')
                  ->alwaysShow(),
                Tags::make('Tags')
                  ->autocompleteItems(\App\Tag::pluck('title')->toArray())
                  ->placeholder('Collectors Edition, Selling')
                  ->help('Extra tags to add to the item'),
                KeyValue::make('Metadata')
                  ->help('Store additional metadata here, such as serial numbers, CD keys etc.'),
              ],
              'Images' => [
                Images::make('Images', 'item_images')
                  ->conversionOnPreview('medium-size') // conversion used to display the "original" image
                  ->conversionOnDetailView('thumb') // conversion used on the model's view
                  ->conversionOnIndexView('thumb') // conversion used to display the image on the model's index page
                  ->conversionOnForm('thumb') // conversion used to display the image on the model's form
                  ->fullSize()
                  ->canSee(function($request) {
                    return $request->user()->user_plan['plan']['photos'] === true; // You have to be on a plan that has photo access.
                  }) // full size column
              ],
              'Collections' => [
                Number::make('Collections', function() {
                  return $this->collection()->count();
                })
                  ->sortable()
                  ->onlyOnIndex(),
                BelongsToMany::make('Collections', 'Collection'),
              ]
            ]))->withToolbar()->defaultSearch(true),

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
        return [
          (new NovaPlanCard)->currentUserDetails()
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
          new Filters\TypeFilter,
          new Filters\ConditionFilter,
          new Filters\RegionFilter,
          new Filters\PlatformFilter
        ];
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
          new AddToCollection,
          new DownloadExcel,
        ];
    }
}
