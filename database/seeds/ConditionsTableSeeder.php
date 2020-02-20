<?php

use Illuminate\Database\Seeder;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('acquisitions')->insert([[
        'title' => 'Non Functional',
        'description' => 'Item is non functional',
        'grade' => 0
      ],
      [
        'title' => 'Poor Condition',
        'description' => 'Item is in very poor condition. Labels may be badly torn or the item may have deep cuts in it',
        'grade' => 10
      ],
      [
        'title' => 'Used Condition',
        'description' => 'Item has been used. Has signs of wear and tear, fading due to sunlight etc.',
        'grade' => 20
      ],
      [
        'title' => 'Not Working',
        'description' => 'Item is non functional',
        'grade' => 30
      ],
      [
        'title' => 'Not Working',
        'description' => 'Item is non functional',
        'grade' => 0
      ],
      [
        'title' => 'Not Working',
        'description' => 'Item is non functional',
        'grade' => 0
      ]]); // Put some acquisition methods into the database
    }
}
