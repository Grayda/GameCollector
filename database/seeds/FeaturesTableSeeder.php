<?php

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('features')->insert([[
        'title' => 'Box',
        'slug' => 'box',
        'description' => 'Box or original packaging'
      ],
      [
        'title' => 'Manual',
        'slug' => 'manual',
        'description' => 'Manual. May also include warranty card, etc.'
      ],
      [
        'title' => 'Power',
        'slug' => 'power',
        'description' => 'Charger or power supply'
      ],
      [
        'title' => 'AV Cables',
        'slug' => 'av_cables',
        'description' => 'Cables such as HDMI, RF or RCA'
      ],
      [
        'title' => 'Case',
        'slug' => 'case',
        'description' => 'Carry case (e.g. protective cases for Gameboy cartridges)'
      ],
      [
        'title' => 'Cables',
        'slug' => 'cables',
        'description' => 'Additional cables, such as USB or game link cables'
      ],
      [
        'title' => 'Controllers',
        'slug' => 'controllers',
        'description' => 'Controllers for the item'
      ]]);
    }
}
