<?php

namespace Database\Seeders;

use App\Models\PaymentCategory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        
        $onlineGateway = PaymentCategory::create(['name_ar' => 'بوابة دفع الكترونية ' ,  'name_en' => 'Online Gateway ' ,   'description_ar' =>  $faker->paragraph()  ,  'description_en' =>  $faker->paragraph()  ,    'status' => true  , 'published_on' => $faker->dateTime()]);
        $bankTransfer = PaymentCategory::create(['name_ar' => 'حوالة بنكية' ,  'name_en' => 'Bank Transfer ' ,   'description_ar' =>  $faker->paragraph()  ,  'description_en' =>  $faker->paragraph()  ,    'status' => true  , 'published_on' => $faker->dateTime()]);
        $electronicWallet = PaymentCategory::create(['name_ar' => 'محفظة بنكية' ,  'name_en' => 'ُElectronic Wallet' ,   'description_ar' =>  $faker->paragraph()  ,  'description_en' =>  $faker->paragraph()  ,    'status' => true  , 'published_on' => $faker->dateTime()]);
        $electronicCard = PaymentCategory::create(['name_ar' => 'بطاقة الكترونية' ,  'name_en' => 'Electronic Card' ,   'description_ar' =>  $faker->paragraph()  ,  'description_en' =>  $faker->paragraph()  ,    'status' => true  , 'published_on' => $faker->dateTime()]);
       
    }
}
