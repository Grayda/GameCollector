<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;
use Laravel\Nova\Fields\Number;

use Illuminate\Support\Str;

class DuplicateItem extends Action
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

        if(auth()->user()->user_plan['remaining'] <= 0) {
          return Action::danger('Unable to duplicate item. You have no items remaining!');
        }

        $newModel = $models[0]->replicate();
        $newModel->item_id = Str::uuid();
        $newModel->title = $newModel->title . " - Copy";
        $newModel->save();

        return Action::push('/resources/items/' . $newModel->id . '/edit');
    }

    /**
     * Get the fields available on the action.
     *
     * @return array
     */
    public function fields()
    {
        return [];
    }
}
