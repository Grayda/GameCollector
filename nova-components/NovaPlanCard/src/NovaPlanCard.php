<?php

namespace Grayda\NovaPlanCard;

use Laravel\Nova\Card;

class NovaPlanCard extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = 'full';

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-plan-card';
    }

    public function currentUserDetails() {

      $user = auth()->user();
      $name = $user->name;
      $plan = $user->user_plan;

      return $this->withMeta(['user' => $name, 'user_plan' => $plan]);
    }
}
