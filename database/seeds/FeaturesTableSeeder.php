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
        'description' => 'Box or original packaging'
      ],
      [
        'title' => 'Manual',
        'description' => 'Manual. May also include warranty card, etc.'
      ],
      [
        'title' => 'Power',
        'description' => 'Charger or power supply'
      ],
      [
        'title' => 'AV Cables',
        'description' => 'Cables such as HDMI, RF or RCA'
      ],
      [
        'title' => 'Case',
        'description' => 'Carry case (e.g. protective cases for Gameboy cartridges)'
      ],
      [
        'title' => 'Cables',
        'description' => 'Additional cables, such as USB or game link cables'
      ]]);
    }
}
