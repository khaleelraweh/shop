<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $images[] = ['file_name' => '1.webp', 'file_type' => 'images/webp', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '2.webp', 'file_type' => 'images/webp', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '3.webp', 'file_type' => 'images/webp', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '4.webp', 'file_type' => 'images/webp', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '5.webp', 'file_type' => 'images/webp', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '6.webp', 'file_type' => 'images/webp', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '7.webp', 'file_type' => 'images/webp', 'file_size' => rand(100, 900), 'file_status' => true];
            $images[] = ['file_name' => '8.webp', 'file_type' => 'images/webp', 'file_size' => rand(100, 900), 'file_status' => true];
    
            // get all products from product table each product use $images arrays
            // each product use media() function from Product Model then 
            // create more than one to db between one or two image
            ProductCategory::all()->each(function ($productCategory) use ($images) {
                $productCategory->photo()->createMany(Arr::random($images, rand(1, 1)));
            });


            //product photo faker 
            Product::all()->each(function ($product) use ($images) {
                $product->photos()->createMany(Arr::random($images, rand(2, 3)));
            });

            //news photo faker 
            News::all()->each(function ($news) use ($images) {
                $news->photos()->createMany(Arr::random($images, rand(2, 3)));
            });

            //slider photo faker 
            Slider::all()->each(function ($slider) use ($images) {
                $slider->photos()->createMany(Arr::random($images, rand(2, 3)));
            });


            

           
        }
    }
}
