<?php

use Illuminate\Database\Seeder;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('platforms')->insert([[
        'title' => 'Nintendo 64',
        'description' => 'Nintendo 64',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Gameboy',
        'description' => 'Gameboy (Original)',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Gameboy Color',
        'description' => 'Gameboy Color',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Gameboy Advance',
        'description' => 'Gameboy Advance',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Super Nintendo (SNES)',
        'description' => 'Super Nintendo Entertainment System',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Nintendo (NES)',
        'description' => 'Nintendo Entertainment System',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Nintendo Gamecube',
        'description' => 'Nintendo Gamecube',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Nintendo Wii',
        'description' => 'Nintendo Wii',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Nintendo Wii U',
        'description' => 'Nintendo Wii U',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Nintendo Switch',
        'description' => 'Nintendo Switch',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Game & Watch',
        'description' => 'Game & Watch',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Atari 2600',
        'description' => 'Atari 2600',
        'manufacturer' => 'Atari'
      ],
      [
        'title' => 'Atari 5200',
        'description' => 'Atari 5200',
        'manufacturer' => 'Atari'
      ],
      [
        'title' => 'Atari 7800',
        'description' => 'Atari 7800',
        'manufacturer' => 'Atari'
      ],
      [
        'title' => 'Playstation 1',
        'description' => 'Playstation 1',
        'manufacturer' => 'Sony'
      ],
      [
        'title' => 'Playstation 2',
        'description' => 'Playstation 2',
        'manufacturer' => 'Sony'
      ],
      [
        'title' => 'Playstation 3',
        'description' => 'Playstation 3',
        'manufacturer' => 'Sony'
      ],
      [
        'title' => 'Xbox 360',
        'description' => 'Xbox 360',
        'manufacturer' => 'Microsoft'
      ],
      [
        'title' => 'Famicom',
        'description' => 'Nintendo Famicom (not the FDS or Super Famicom)',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Famicom Disk System',
        'description' => 'Famicom Disk System (FDS)',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Super Famicom',
        'description' => 'Super Famicom',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Nintendo 64DD',
        'description' => 'Nintendo 64DD Disk Drive',
        'manufacturer' => 'Nintendo'
      ],
      [
        'title' => 'Other',
        'description' => 'Other Platforms',
        'manufacturer' => 'Other'
      ],
    ]);
    }
}
