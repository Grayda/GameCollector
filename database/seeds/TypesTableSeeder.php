<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('types')->insert([[
        'title' => 'Console',
        'description' => 'Console. This also includes items such as the Game & Watch, even though they don\'t take external games'
      ],
      [
        'title' => 'Controller',
        'description' => 'Controller for a console'
      ],
      [
        'title' => 'Game',
        'description' => 'A game that would be inserted into a console'
      ],
      [
        'title' => 'Box',
        'description' => 'A box belonging to a console, game, controller etc.'
      ],
      [
        'title' => 'Accessory',
        'description' => 'An accessory for an item, such as a Rumble Pak, Expansion Pak etc.'
      ],
      [
        'title' => 'Power Pack',
        'description' => 'A power pack or charger for an item'
      ],
      [
        'title' => 'Audio / Video',
        'description' => 'An AV accessory, such as an RF cable, composite cable etc.'
      ],
      [
        'title' => 'Case',
        'description' => 'A case or bag for an item (such as a console / game storage case for a Switch)'
      ],
      [
        'title' => 'Collectible',
        'description' => 'A collectible item, such as an Amiibo or game-related merchandise'
      ],
      [
        'title' => 'Manual',
        'description' => 'A manual or booklet for an item'
      ],
    }
}
