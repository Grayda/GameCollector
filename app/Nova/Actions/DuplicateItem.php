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
        foreach($models as $model) {
          for($i = 0; $i <= $fields['number'] - 1; $i++) {
            $newModel = $model->replicate();
            $newModel->item_id = Str::uuid();
            $newModel->save();
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
          Number::make('Number')
            ->help('How many copies to make (minimum 1, maximum 5)')
            ->rules(['required', 'numeric', 'min:1', 'max:5', function($attribute, $value, $fail) {
              $remaining = (auth()->user()->user_plan['remaining'] ?? 0);
              if($remaining - $value < 0) {
                $fail('You only have ' . $remaining . ' items left');
              }
            }])
        ];
    }
}
