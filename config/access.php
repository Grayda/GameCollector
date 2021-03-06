<?php

return [
  'tiers' => [ // Access levels
    'none' => [
      'id' => '',
      'name' => 'No Plan',
      'photos' => false, // User can't upload photos,
      'photo_limit' => false,
      'limit' => 0, // Can only add 100 items
      'collection_limit' => 0,
      'icon' => 'fas fa-mobile',
      'price' => 0,
      'trial' => false,
      'selectable' => false,
      'default' => false,
    ],
    'konami-code' => [ // This plan is unlimited but free.
      'id' => env('PLAN_KONAMI_ID'),
      'name' => 'Konami Code',
      'photos' => true, // User can add photos,
      'photo_limit' => -1,
      'limit' => -1, // Can only add 100 items
      'collection_limit' => -1, // Can only add 10 collections
      'icon' => 'fas fa-user-secret',
      'price' => 0,
      'trial' => false,
      'selectable' => false,
      'default' => false,
    ],
    'casual-gamer' => [
      'id' => env('PLAN_CASUAL_ID'),
      'name' => 'Casual Gamer',
      'photos' => false, // User can't add photos,
      'photo_limit' => false,
      'limit' => 100, // Can only add 100 items
      'collection_limit' => 10, // Can only add 10 collections
      'icon' => 'fas fa-mobile',
      'price' => 2,
      'trial' => 7, // 7 Day Trial
      'selectable' => true,
      'default' => false,
    ],
    'hardcore-gamer' => [
      'id' => env('PLAN_HARDCORE_ID'),
      'name' => 'Hardcore Gamer',
      'photos' => true, // User can add photos,
      'photo_limit' => 5,
      'limit' => 500, // Can add up to 500 items
      'collection_limit' => 50, // Can add up to 50 collections
      'icon' => 'fas fa-gamepad',
      'price' => 5,
      'selectable' => true,
      'trial' => 7, // 7 Day Trial
      'default' => true,
    ],
    'completionist' => [
      'id' => env('PLAN_COMPLETIONIST_ID'),
      'name' => 'Completionist',
      'photos' => true, // User can add photos,
      'photo_limit' => -1,
      'limit' => -1, // Unlimited items.
      'collection_limit' => -1, // Unlimited collections.
      'icon' => 'fas fa-trophy',
      'price' => 10,
      'selectable' => true,
      'trial' => 7, // 7 Day Trial
      'default' => false,
    ],
  ]
];
