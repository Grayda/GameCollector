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
      DB::table('conditions')->insert([[
        'title' => 'Non Functional',
        'description' => 'Item is non functional',
        'grade' => 10
      ],
      [
        'title' => 'Poor',
        'description' => 'Item is in very poor condition. Labels may be badly torn or the item may have deep cuts in it',
        'grade' => 20
      ],
      [
        'title' => 'Used',
        'description' => 'Item has been used. Has visible signs of wear and tear, fading / yellowing due to sunlight etc.',
        'grade' => 30
      ],
      [
        'title' => 'Good',
        'description' => 'Item is in good condition. May show signs of wear and tear or light scratches, but is in generally good condition',
        'grade' => 40
      ],
      [
        'title' => 'Very Good',
        'description' => 'Item is in very good condition. Wear and tear is not as obvious',
        'grade' => 50
      ],
      [
        'title' => 'Excellent',
        'description' => 'Item is in excellent condition. There\'s little wear and tear / scratches / fading',
        'grade' => 60
      ],
      [
        'title' => 'Near Mint',
        'description' => 'Very little signs of use',
        'grade' => 70
      ],
      [
        'title' => 'Mint',
        'description' => 'Item has been used, but shows no signs of being used',
        'grade' => 80
      ],
      [
        'title' => 'Like New',
        'description' => 'Almost perfect condition. May show signs of handling or being opened then resealed',
        'grade' => 90
      ],
      [
        'title' => 'New',
        'description' => 'Item has never been opened or played. May still include shrink wrapping or security stickers',
        'grade' => 100
      ]]); // Put some condition grades into the database
    }
}
