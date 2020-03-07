<?php

return [
  'tiers' => [ // Access levels
    "none" => [
      'name' => 'No Plan',
      'photos' => false, // User can't upload photos
      'limit' => 0, // Can only add 100 items
      'collection_limit' => 0,
    ],
    'level1' => [
      'name' => 'Casual Gamer',
      'photos' => false, // User can't upload photos
      'limit' => 100, // Can only add 100 items
      'collection_limit' => 10, // Can only add 10 collections
    ],
    'level2' => [
      'name' => 'Hardcore Gamer',
      'photos' => true, // User can add photos
      'limit' => 500, // Can add up to 500 items
      'collection_limit' => 50, // Can add up to 50 collections
    ],
    'level3' => [
      'name' => 'Completionist',
      'photos' => true,
      'limit' => -1, // Unlimited items.
      'collection_limit' => -1, // Unlimited collections.
    ]
  ]
];
