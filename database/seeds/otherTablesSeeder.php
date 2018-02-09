<?php

use Illuminate\Database\Seeder;

class otherTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = date("Y-m-d H:i:s");
        DB::insert("INSERT INTO `environmental_category` VALUES (1,'ژِئوپارک'),(2,'منطقه شکار ممنوع'),(3,'منطقه امن'),(4,'ذخیره گاه زیست کره'),(5,'منطقه حفاظت شده'),(6,'پناهگاه حیات وحش'),(7,'اثر طبیعی ملی'),(8,'پارک ملی'),(9,'تالاب');");
        DB::table('natural_tourism_attraction')->insert([
        		'id'=>39,
        		'name'=>'کفترلو',
        		'description'=>'آبشاری زیبا در کنار روستای کند لواسان',
        		'englishAddress'=>null,
        		'englishName'=>'kaftarloo',
        		'folkAddress'=>null,
        		'xPosition'=>'35.88',
        		'yPosition'=>'51.67',
        		'zPosition'=>'0',
        		'climate_id'=>'1',
        		'division_id'=>'311',
        		'envCat_id'=>8,
        		'ntaType_id'=>'3',
        		'created_at'=>$now , 
        		'updated_at'=>$now,
        ]);
        DB::insert("INSERT INTO `nta_access_way` VALUES ('مهرآباد',39,1),('ترمینال شرق',39,2),('تهران',39,3),('لواسان',39,5)");
        DB::insert("INSERT INTO `nta_activity` VALUES (39,1),(39,4),(39,9),(39,10),(39,11),(39,14)");
        DB::insert("INSERT INTO `nta_type` (id,iconName,name)VALUES (1,'desert.svg','کویر'),(2,'jungle.svg','جنگل'),(3,'fountain.svg','دریاچه'),(4,'mountain.svg','کوه'),(5,'pond.svg','چشمه');");
        DB::insert("INSERT INTO `tourism_activity` VALUES (1,'کوهنوردی'),(2,'سفر در مسیر بدون جاده'),(3,'دوچرخه سواری'),(4,'موتورسواری'),(5,'سواری با اتوموبیلهای دودیفرانسیل'),(6,'ماهیگیری'),(7,'ژئوتوریسم'),(8,'تماشای حیات وحش'),(9,'عکاسی در طبیعت'),(10,'کمپینگ'),(11,'دامنه پیمایی (گلگشت)'),(12,'کوهپیمایی'),(13,'پیاده روی در طبیعت'),(14,'تماشای مناظر طبیعی'),(15,'بیابان گردی'),(16,'رصد ستارگان'),(17,'جنگل گردی');");
    }
}
