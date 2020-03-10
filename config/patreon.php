<?php

  return [
    'webhook' => [
      'enabled' => true,
      'hash' => env('PATREON_WEBHOOK_SECRET')
    ]
  ];
