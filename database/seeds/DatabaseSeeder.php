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
        #$this->call(UserSeeder::class);
        #$this->call(TypesSeeder::class);
        #$this->call(SpecializationSeeder::class);
        #$this->call(RangeProdSeeder::class);
        #$this->call(OpeningSeeder::class);
        $this->call(MainsSeeder::class);
    }
}
