<?php

return [
  'tiers' => [ // Access levels
    'level1' => [
      'name' => 'Casual Gamer',
      'photos' => false, // User can't upload photos
      'limit' => 100 // Can only add 100 items
    ],
    'level2' => [
      'name' => 'Hardcore Gamer',
      'photos' => true, // User can add photos
      'limit' => 500, // Can add up to 500 items
    ],
    'level3' => [
      'name' => 'Completionist',
      'photos' => true,
      'limit' => -1 // Unlimited items.
    ]
  ]
];
