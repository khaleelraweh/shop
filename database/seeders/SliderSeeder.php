<?php

namespace Database\Seeders;

use App\Models\Slider;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ar_JO');

        $target = ['_self' , '_blank'];


        for( $i = 1; $i <= 5; $i++ ){
            $sliders [] = [
                'title'         =>  $faker->realTextBetween(10,12),
                'slug'          =>  $faker->unique()->slug(3),
                'content'       =>  $faker->realTextBetween(10,12),
                'url'           =>  'https://' . $faker->slug(2) . '.com',
                'target'        =>  Arr::random($target),
                'section'       => Arr::random([1,2]),
                'published_on'  =>  $faker->dateTime(),
                'created_by'    =>  $faker->realTextBetween(10,12),
                'updated_by'   =>  $faker->realTextBetween(10,12),
                'deleted_at'    =>  null,
                'created_at'    =>  now(),
                'updated_at'    =>  now(),
            ];

        }

        $chuncks = array_chunk($sliders, 100);
        foreach($chuncks as $chunck){
            Slider::insert($chunck);
        }
    }
}
