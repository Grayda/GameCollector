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
      // DB::table('users')->insert([[
      //   'name' => 'David Gray',
      //   'email' => 'david@davidgray.photography',
      //   'email_verified_at' => now()->toDateTimeString(),
      //   'password' => Hash::make('password'),
      //   'is_admin' => true
      // ],
      // [
      //   'name' => 'Unverified User',
      //   'email' => 'unverified@example.com',
      //   'email_verified_at' => null,
      //   'password' => Hash::make('password'),
      //   'is_admin' => false
      // ],
      // [
      //   'name' => 'Verified User',
      //   'email' => 'verified@example.com',
      //   'email_verified_at' => now()->toDateTimeString(),
      //   'password' => Hash::make('password'),
      //   'is_admin' => false
      // ]]); // Load a sample user into the database
    }
}
