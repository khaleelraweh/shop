<?php

namespace Database\Seeders;

use App\Models\CommonQuestion;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommonQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ar_JO');
        for( $i = 1; $i <= 3; $i++ ){
            CommonQuestion::create([
                'title'         =>  $faker->realTextBetween(10,12),
                'content'       =>  $faker->realText(50),
                'published_on'  =>  Carbon::now(),
                'status'        =>  1,
            ]);
        }
    }
}
