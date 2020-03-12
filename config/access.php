<?php

return [
  'tiers' => [ // Access levels
    'none' => [
      'id' => '',
      'name' => 'No Plan',
      'photos' => false, // User can't upload photos
      'limit' => 0, // Can only add 100 items
      'collection_limit' => 0,
      'icon' => 'fas fa-mobile',
      'price' => 0,
      'selectable' => false,
    ],
    'casual-gamer' => [
      'id' => 'plan_GtSyLg7xrUh2yD',
      'name' => 'Casual Gamer',
      'photos' => false, // User can't upload photos
      'limit' => 100, // Can only add 100 items
      'collection_limit' => 10, // Can only add 10 collections
      'icon' => 'fas fa-mobile',
      'price' => 2,
      'selectable' => true,
      'default' => false,
    ],
    'hardcore-gamer' => [
      'id' => 'plan_GtSyfwJOqHyLWU',
      'name' => 'Hardcore Gamer',
      'photos' => true, // User can add photos
      'limit' => 500, // Can add up to 500 items
      'collection_limit' => 50, // Can add up to 50 collections
      'icon' => 'fas fa-gamepad',
      'price' => 5,
      'selectable' => true,
      'default' => true,
    ],
    'completionist' => [
      'id' => 'plan_GtSzRzUhAadmqI',
      'name' => 'Completionist',
      'photos' => true,
      'limit' => -1, // Unlimited items.
      'collection_limit' => -1, // Unlimited collections.
      'icon' => 'fas fa-trophy',
      'price' => 10,
      'selectable' => true,
      'default' => false,
    ],
  ]
];
