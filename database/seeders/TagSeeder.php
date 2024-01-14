<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name' =>  'شدات', 'status' => true]);
        Tag::create(['name' =>  'بوبجي', 'status' => true]);
        Tag::create(['name' =>  'إنمي', 'status' => true]);
        Tag::create(['name' =>  'كروت', 'status' => true]);
        Tag::create(['name' =>  'بطاقات', 'status' => true]);
        Tag::create(['name' =>  'مميزات', 'status' => true]);
        Tag::create(['name' =>  'تخفيضات', 'status' => true]);
        Tag::create(['name' =>  'عروض', 'status' => true]);
    }
}
