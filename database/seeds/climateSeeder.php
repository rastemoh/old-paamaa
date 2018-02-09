<?php

use Illuminate\Database\Seeder;

class climateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO `climate` (id,colorCode,name)VALUES (1,'#26c976','معتدل و مرطوب'),(2,'#8ccbdd','سرد و برفی'),(3,' #ccb19c','گرم و خشک'),(4,' #e4d361','گرم و مرطوب')");
    }
}
