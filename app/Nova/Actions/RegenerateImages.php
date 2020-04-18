<?php

namespace App\Nova\Actions;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Collection;
use Laravel\Nova\Actions\Action;
use Laravel\Nova\Fields\ActionFields;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Artisan;

class RegenerateImages extends Action
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

        $key = 'regenerate-throttle-' . auth()->user()->id;

        $tries = Cache::remember($key, now()->addSeconds(30), function() { return 0; });

        if($models->count() > 3) {
          return Action::danger('You can only regenerate 3 images as a time');
        }

        if($tries + $models->count() > 3) {
          return Action::danger('You can only run this action 3 times every 30 seconds');
        }

        Artisan::call('medialibrary:regenerate', [
          '--ids' => $models->pluck('id')->join(',')
        ]);

        Cache::increment($key, $models->count());

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
