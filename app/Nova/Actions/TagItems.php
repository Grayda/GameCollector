<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

use Superlatif\NovaTagInput\Tags;
use Laravel\Nova\Fields\Select;

class TagItems extends Action
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
      foreach($models as $model) {
        switch($fields->type) {
          case 'set':
            $model->tags = $fields->tags;
            $model->save();
          break;
          case 'add':
            $tags = collect($fields->tags);
            $model->tags = $model->tags->merge($tags);
            $model->save();
          break;
          case 'remove':
            $tags = collect($fields->tags);
            $model->tags = $model->tags->reject(function($item) use ($tags) {
              return $tags->contains($item);
            })->values();
            $model->save();
          break;
        }
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
          Tags::make('Tags')
            ->autocompleteItems(\App\Tag::pluck('title')->toArray())
            ->placeholder('Collectors Edition, Selling')
            ->help('Extra tags to add to the item'),
          Select::make('Tag Options', 'type')->options([
            'add' => 'Add these tag(s) to existing tags',
            'remove' => 'Remove these tag(s) from existing tags',
            'set' => 'Replace all tags with the selected tag(s)',
          ])->rules('required'),
        ];
    }
}
