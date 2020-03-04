<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tags')->insert([[
        'title' => 'Sold',
        'description' => 'Item has been sold'
      ],
      [
        'title' => 'Modded',
        'description' => 'Item is modified (e.g. mod chip, different case, new screen)'
      ],
      [
        'title' => 'Lost',
        'description' => 'Item can\'t be found'
      ],
      [
        'title' => 'Stolen',
        'description' => 'Item was stolen'
      ],
      [
        'title' => 'Rare',
        'description' => 'Item is rare or very hard to come by'
      ],
      [
        'title' => 'Limited Edition',
        'description' => 'Item is limited edition, sold in smaller numbers'
      ],
      [
        'title' => 'Third Party',
        'description' => 'Item is a third party item (e.g. aftermarket controllers, clones etc.)'
      ],
      [
        'title' => 'Reproduction',
        'description' => 'Item is a reproduction (e.g. games you would buy on AliExpress)'
      ],
      [
        'title' => 'Wishlist',
        'description' => 'Items not yet owned'
      ],
      [
        'title' => 'Played',
        'description' => 'Game, console etc. that has been played, either to completion, or at least partially'
      ],
      [
        'title' => 'Selling',
        'description' => 'This item is for sale'
      ],
    ]);
    }
}
