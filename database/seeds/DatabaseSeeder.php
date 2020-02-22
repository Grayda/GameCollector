<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AcquisitionsTableSeeder::class);
        $this->call(ConditionsTableSeeder::class);
        $this->call(PlatformsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
    }
}
