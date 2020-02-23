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
        'title' => 'Donation',
        'description' => 'Donated (e.g. given to you by a friend)'
      ],
      [
        'title' => 'Garage Sale',
        'description' => 'Purchased from a garage sale'
      ],
      [
        'title' => 'Pawn Shop',
        'description' => 'Purchased from a pawn shop'
      ],
      [
        'title' => 'Op Shop / Thrift Shop',
        'description' => 'Purchased from a thrift store (e.g. Goodwill, Salvation Army)'
      ]]); // Put some acquisition methods into the database
    }
}
