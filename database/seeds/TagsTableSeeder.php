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
        'name' => '{"en":"Sold"}',
        'slug' => '{"en":"sold"}'
      ],
      [
        'name' => '{"en":"Modded"}',
        'slug' => '{"en":"modded"}'
      ],
      [
        'name' => '{"en":"Lost"}',
        'slug' => '{"en":"lost"}'
      ],
      [
        'name' => '{"en":"Stolen"}',
        'slug' => '{"en":"stolen"}'
      ],
      [
        'name' => '{"en":"Rare"}',
        'slug' => '{"en":"rare"}'
      ],
      [
        'name' => '{"en":"Limited Edition"}',
        'slug' => '{"en":"limited-edition"}'
      ],
      [
        'name' => '{"en":"Third Party"}',
        'slug' => '{"en":"third-party"}'
      ],
      [
        'name' => '{"en":"Reproduction"}',
        'slug' => '{"en":"reproduction"}'
      ],
    }
}
