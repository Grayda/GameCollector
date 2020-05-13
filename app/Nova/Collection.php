<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\BooleanGroup;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Http\Requests\NovaRequest;

class Collection extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Collection';

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
    public static $group = 'Collections';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'title',
        'description'
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
            ID::make()->sortable(),
            Text::make('Title')
              ->help('Name of this collection'),
            Markdown::make('Description')
              ->help('Description of this collection'),
            Boolean::make('Public')
              ->help('Is this collection shareable?'),
            Select::make('Layout')->options([
              'cards' => 'Card Layout',
              'list' => 'List Layout'
            ])
              ->displayUsingLabels()
              ->required()
              ->help('Which layout should this collection use?'),
            Number::make('Item Count', function($value) {
              return $value->items()->mine()->count();
            })
              ->exceptOnForms(),
            BooleanGroup::make('Fields')
              ->options([
                'images' => 'Images',
                'notes' => 'Notes',
                'condition' => 'Condition',
                'region' => 'Region',
                'tags' => 'Tags',
                'type' => 'Item Type',
                'features' => 'Features',
                'metadata' => 'Metadata',
                'selling_price' => 'Selling Price',
                'related' => 'Child Items'
              ])
              ->required()
              ->help('What fields should appear in the collection?'),

            BelongsToMany::make('Items'),
            Text::make('Collection URL', function($value) {
              if($value->public) {
                return '<a href="' . $value->url . '" target="blank">' . $value->url . '</a>';
              } else {
                return 'Make the collection public to get the URL';
              }
            })
              ->asHtml()
              ->exceptOnForms()
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
        return [];
    }
}
