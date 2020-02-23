<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'David Gray',
        'email' => 'david@davidgray.photography',
        'email_verified_at' => now()->toDateTimeString(),
        'password' => Hash::make('password')
      ]); // Load a sample user into the database
    }
}
