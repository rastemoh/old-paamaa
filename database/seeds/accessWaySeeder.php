<?php

use Illuminate\Database\Seeder;

class accessWaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = date("Y-m-d H:i:s");
    	DB::table('access_way')->insert([
    			['name' => 'هوایی'],
    			['name' => 'اتوبوس'],
    			['name' => 'راه آهن'],
    			['name' => 'دریایی'],
    			['name' => 'خودرو شخصی'],
    			]);

//     	DB::table('access_way')->insert(['name'=>'salam','iconName'=>null]);
    }
}
