<?php

use Illuminate\Database\Seeder;

class AcquisitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('acquisitions')->insert([[
        'title' => 'Unknown',
        'description' => 'Method of acquisition unknown',
      ],
      [
        'title' => 'Facebook Marketplace',
        'description' => 'Acquired from Facebook Marketplace'
      ],
      [
        'title' => 'Retail',
        'description' => 'Purchased from a retail store (e.g. GameStop)'
      ],
      [
        'title' => 'Donation / Present',
        'description' => 'Donated (e.g. given to you by a friend) or a present (e.g. birthday, christmas)'
      ],
      [
        'title' => 'Garage Sale / Flea Market',
        'description' => 'Purchased from a garage sale or flea market'
      ],
      [
        'title' => 'Pawn Shop',
        'description' => 'Purchased from a pawn shop'
      ],
      [
        'title' => 'Op Shop / Thrift Shop',
        'description' => 'Purchased from a thrift store (e.g. Goodwill, Salvation Army)'
      ],
      [
        'title' => 'Game Dealer',
        'description' => 'Purchased from a games dealer (e.g. JJGames, DKOldies etc.)'
      ]]); // Put some acquisition methods into the database
    }
}
