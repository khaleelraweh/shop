<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $popgy = ProductCategory::create(['name' => 'بوبجي'      ,   'description' =>  $faker->paragraph()  ,    'status' => true  ,  'section' => 2  , 'published_on' => $faker->dateTime()  ,  'parent_id' => null]);
       

        $starWar = ProductCategory::create(['name' => 'حرب النجوم'  ,  'description' =>  $faker->paragraph() , 'status' => true  ,  'section' => 2  ,  'published_on'  =>  $faker->dateTime()  ,   'parent_id' => null]);
       
        $legends = ProductCategory::create(['name' => 'الاسطورة' ,   'description' =>  $faker->paragraph() , 'status' => true  ,  'section' => 2  ,  'published_on'  =>  $faker->dateTime()        ,  'parent_id' => null]);
        
        $middleCentery = ProductCategory::create(['name' => 'القرون الوسطي'  ,  'description' =>  $faker->paragraph() , 'status' => true  ,  'section' => 2  ,  'published_on'   =>  $faker->dateTime()   ,  'parent_id' => null]);
       
    }
}
