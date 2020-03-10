<?php

return [
  'tiers' => [ // Access levels
    'level3' => [
      'name' => 'Completionist',
      'photos' => true,
      'limit' => -1, // Unlimited items.
      'collection_limit' => -1, // Unlimited collections.
      'conditions' => [
        'min-pledge' => 1000,
        'max-pledge' => 90000
      ]
    ],
    'none' => [
      'name' => 'No Plan',
      'photos' => false, // User can't upload photos
      'limit' => 0, // Can only add 100 items
      'collection_limit' => 0,
      'conditions' => [
        'min-pledge' => -1000,
        'max-pledge' => 0
      ]
    ],
    'level1' => [
      'name' => 'Casual Gamer',
      'photos' => false, // User can't upload photos
      'limit' => 100, // Can only add 100 items
      'collection_limit' => 10, // Can only add 10 collections
      'conditions' => [
        'min-pledge' => 200,
        'max-pledge' => 499
      ]
    ],
    'level2' => [
      'name' => 'Hardcore Gamer',
      'photos' => true, // User can add photos
      'limit' => 500, // Can add up to 500 items
      'collection_limit' => 50, // Can add up to 50 collections
      'conditions' => [
        'min-pledge' => 500,
        'max-pledge' => 999
      ]
    ],

  ]
];
