<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('regions')->insert([[
        'title' => 'NTSC-U',
        'description' => 'NTSC (US) games',
      ],
      [
        'title' => 'NTSC-J',
        'description' => 'NTSC (Japanese) Games',
      ],
      [
        'title' => 'NTSC-C',
        'description' => 'NTSC (Chinese) Games',
      ],
      [
        'title' => 'PAL',
        'description' => 'PAL games',
      ],
      [
        'title' => 'Other / Region Free',
        'description' => 'Games from other regions',
      ],
      [
        'title' => 'Unknown',
        'description' => 'Region Unknown',
      ],
      ]);
    }
}
