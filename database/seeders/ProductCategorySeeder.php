<?php

namespace Database\Seeders;

use App\Models\Photo;
use App\Models\ProductCategory;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $colthes = ProductCategory::create(['name' => 'Clothes'      ,   'description' =>  $faker->paragraph()  ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => null]);
        ProductCategory::create(['name' => 'Women\'s T-shirts'       ,   'description' =>  $faker->paragraph()  ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $colthes->id]);
        ProductCategory::create(['name' => 'Men\'s T-shirts'         ,   'description' =>  $faker->paragraph()  ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $colthes->id]);
        ProductCategory::create(['name' => 'Dresses\'s T-shirts'     ,   'description' =>  $faker->paragraph()  ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $colthes->id]);
        ProductCategory::create(['name' => 'Novelty Socks T-shirts'  ,   'description' =>  $faker->paragraph()  ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $colthes->id]);
        ProductCategory::create(['name' => 'Women\'s Sunglasses'     ,   'description' =>  $faker->paragraph()  ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $colthes->id]);
        ProductCategory::create(['name' => 'Men\'s Sunglasses'       ,   'description' =>  $faker->paragraph()  ,    'status' => true  , 'published_on' => $faker->dateTime()  , 'parent_id' => $colthes->id]);


        $shose = ProductCategory::create(['name' => 'Shoes'  ,  'description' =>  $faker->paragraph() , 'status' => true ,  'published_on'  =>  $faker->dateTime()    ,  'parent_id' => null]);
        ProductCategory::create(['name' => 'Women\'s shose'  ,  'description' =>  $faker->paragraph() , 'status' => true ,  'published_on'  =>  $faker->dateTime()    ,  'parent_id' => $shose->id]);
        ProductCategory::create(['name' => 'Men\'s shose'    ,  'description' =>  $faker->paragraph() , 'status' => true ,  'published_on'  =>  $faker->dateTime()    ,  'parent_id' => $shose->id]);
        ProductCategory::create(['name' => 'Boy\'s shose'    ,  'description' =>  $faker->paragraph() , 'status' => true ,  'published_on'  =>  $faker->dateTime()    ,  'parent_id' => $shose->id]);
        ProductCategory::create(['name' => 'Girls\'s shose'  ,  'description' =>  $faker->paragraph() , 'status' => true ,  'published_on'  =>  $faker->dateTime()    ,  'parent_id' => $shose->id]);

        $watches = ProductCategory::create(['name' => 'Watches' ,   'description' =>  $faker->paragraph() , 'status' => true ,  'published_on'  =>  $faker->dateTime()         ,  'parent_id' => null]);
        ProductCategory::create(['name' => 'Women\'s watches'   ,   'description' =>  $faker->paragraph() , 'status' => true ,  'published_on'  =>  $faker->dateTime()         ,  'parent_id' => $watches->id]);
        ProductCategory::create(['name' => 'Men\'s watches'     ,   'description' =>  $faker->paragraph() , 'status' => true ,  'published_on'  =>  $faker->dateTime()         ,  'parent_id' => $watches->id]);
        ProductCategory::create(['name' => 'Boy\'s watches'     ,   'description' =>  $faker->paragraph() , 'status' => true ,  'published_on'  =>  $faker->dateTime()         ,  'parent_id' => $watches->id]);
        ProductCategory::create(['name' => 'Girls\'s watches'   ,   'description' =>  $faker->paragraph() , 'status' => true ,  'published_on'  =>  $faker->dateTime()         ,  'parent_id' => $watches->id]);

        $electronies = ProductCategory::create(['name' => 'Electronies'  ,  'description' =>  $faker->paragraph() , 'status' => true    ,  'published_on'   =>  $faker->dateTime()       ,  'parent_id' => null]);
        ProductCategory::create(['name' => 'Women\'s electronies'        ,  'description' =>  $faker->paragraph() , 'status' => true    ,  'published_on'   =>  $faker->dateTime()       ,  'parent_id' => $electronies->id]);
        ProductCategory::create(['name' => 'Men\'s electronies'          ,  'description' =>  $faker->paragraph() , 'status' => true    ,  'published_on'   =>  $faker->dateTime()       ,  'parent_id' => $electronies->id]);
        ProductCategory::create(['name' => 'Boy\'s electronies'          ,  'description' =>  $faker->paragraph() , 'status' => true    ,  'published_on'   =>  $faker->dateTime()       ,  'parent_id' => $electronies->id]);
        ProductCategory::create(['name' => 'Girls\'s electronies'        ,  'description' =>  $faker->paragraph() , 'status' => true    ,  'published_on'   =>  $faker->dateTime()       ,  'parent_id' => $electronies->id]);

    }
}
