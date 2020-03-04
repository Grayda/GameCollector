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

      DB::table('platforms')->insert([
        // Nintendo Consoles
        [
          'title' => 'Nintendo 64',
          'description' => 'Nintendo 64',
          'manufacturer' => 'Nintendo'
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
          'title' => 'Nintendo 64DD',
          'description' => 'Nintendo 64DD Disk Drive',
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
          'title' => 'Super Famicom (SFC)',
          'description' => 'Super Famicom',
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
        // Atari Consoles
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
          'title' => 'Atari Jaguar',
          'description' => 'Atari Jaguar',
          'manufacturer' => 'Atari'
        ],
        // Playstation Consoles
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
          'title' => 'Playstation 4',
          'description' => 'Playstation 4',
          'manufacturer' => 'Sony'
        ],
        // Xbox consoles
        [
          'title' => 'Xbox',
          'description' => 'Xbox',
          'manufacturer' => 'Microsoft'
        ],
        [
          'title' => 'Xbox 360',
          'description' => 'Xbox 360',
          'manufacturer' => 'Microsoft'
        ],
        [
          'title' => 'Xbox One',
          'description' => 'Xbox One. Includes the One S and One X',
          'manufacturer' => 'Microsoft'
        ],
        // Sega Consoles
        [
          'title' => 'Sega Master System',
          'description' => 'Sega Master System',
          'manufacturer' => 'Sega'
        ],
        [
          'title' => 'Sega Master System',
          'description' => 'Sega Master System',
          'manufacturer' => 'Sega'
        ],
        [
          'title' => 'Sega Genesis',
          'description' => 'Sega Genesis, also known as the Sega Mega Drive',
          'manufacturer' => 'Sega'
        ],
        [
          'title' => 'Sega Dreamcast',
          'description' => 'Sega Dreamcast',
          'manufacturer' => 'Sega'
        ],
        [
          'title' => 'Sega 32X',
          'description' => 'Sega 32X',
          'manufacturer' => 'Sega'
        ],
        [
          'title' => 'Sega CD',
          'description' => 'Sega CD',
          'manufacturer' => 'Sega'
        ],
        // Philips Consoles
        [
          'title' => 'Philips CD-I',
          'description' => 'Philips CD-I',
          'manufacturer' => 'Philips'
        ],
        // PC
        [
          'title' => 'PC',
          'description' => 'Games for personal computers, including Mac',
          'manufacturer' => 'Other'
        ],
        // Commodore Consoles
        [
          'title' => 'Commodore 64',
          'description' => 'Commodore 64 Games',
          'manufacturer' => 'Commodore'
        ],
        [
          'title' => 'Commodore Vic 20',
          'description' => 'Commodore Vic 20 Games',
          'manufacturer' => 'Commodore'
        ],
        // Other Consoles
        [
          'title' => 'Other',
          'description' => 'Other Platforms',
          'manufacturer' => 'Other'
        ],

    ]);
    }
}
