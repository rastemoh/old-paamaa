<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(accessWaySeeder::class);
         $this->call(adminDivisionSeeder::class);
         $this->call(climateSeeder::class);
         $this->call(otherTablesSeeder::class);
         
    }
}
