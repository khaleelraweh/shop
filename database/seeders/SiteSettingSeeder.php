<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        // site infos
        SiteSetting::create(['name'    =>  'site_name'          ,   'value' =>  'Center Pay'                    ,   'status'    =>  true    ,   'section'   =>  1   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_short_name'    ,   'value' =>  'CP'                            ,   'status'    =>  true    ,   'section'   =>  1   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_description'   ,   'value' =>  'This is description'           ,   'status'    =>  true    ,   'section'   =>  1   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_link'          ,   'value' =>  'https://shop.mudhila.com/'     ,   'status'    =>  true    ,   'section'   =>  1   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_img'           ,   'value' =>  '1.jpg'                         ,   'status'    =>  true    ,   'section'   =>  1   ,   'published_on'  =>  $faker->dateTime()  ]);

        // site contacts
        SiteSetting::create(['name'    =>  'site_address'   ,   'value' =>  'المملكة العربية السعودية'    ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_phone'     ,   'value' =>  '772036131'                     ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_mobile'    ,   'value' =>  '436285'                        ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_fax'       ,   'value' =>  'fx'                            ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_po_box'    ,   'value' =>  '985'                           ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_email1'    ,   'value' =>  'centerpay@gmail.com'           ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_email2'    ,   'value' =>  'centerpay2@gmail.com'          ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_workTime'  ,   'value' =>  'طوال ايام الاسبوع'             ,   'status'    =>  true  ,   'section'   =>  2   ,   'published_on'  =>  $faker->dateTime()  ]);

        // site socials
        SiteSetting::create(['name'    =>  'site_facebook'      ,   'value' =>  'centerpay.facebook.com'    ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_twitter'       ,   'value' =>  'Center.twitter.com'        ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_youtube'       ,   'value' =>  'Center.youtube.com'        ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_snapchat'       ,   'value' =>  'Center.snapchat.com'        ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_instagram'     ,   'value' =>  'Center.instagram.com'      ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_google'        ,   'value' =>  'Center.google.com'      ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_vimeo'        ,   'value' =>  'Center.vimeo.com'      ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_pinterest'        ,   'value' =>  'Center.pinterest.com'      ,   'status'    =>  true  ,   'section'   =>  3   ,   'published_on'  =>  $faker->dateTime()  ]);

        // site seo
        SiteSetting::create(['name'    =>  'site_name_meta'             ,   'value' =>  'Center Pay'                ,   'status'    =>  true  ,   'section'   =>  4   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_description_meta'      ,   'value' =>  'Center Pay description'    ,   'status'    =>  true  ,   'section'   =>  4   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_link_meta'             ,   'value' =>  'Center Pay links here'     ,   'status'    =>  true  ,   'section'   =>  4   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_keywords_meta'         ,   'value' =>  'cards , products'          ,   'status'    =>  true  ,   'section'   =>  4   ,   'published_on'  =>  $faker->dateTime()  ]);


        //site pay method 
        SiteSetting::create(['name'    =>  'site_pay_amazon'             ,   'value' =>  'amazon'                ,   'status'    =>  true  ,   'section'   =>  5   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_pay_visa_card'      ,   'value' =>  'visa-card'    ,   'status'    =>  true  ,   'section'   =>  5   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_pay_skrill'      ,   'value' =>  'skrill'    ,   'status'    =>  true  ,   'section'   =>  5   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_pay_master_card'      ,   'value' =>  'master-card'    ,   'status'    =>  true  ,   'section'   =>  5   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_pay_paypal'      ,   'value' =>  'paypal'    ,   'status'    =>  true  ,   'section'   =>  5   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_pay_apple_pay'      ,   'value' =>  'apple-pay'    ,   'status'    =>  true  ,   'section'   =>  5   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_pay_klarna'      ,   'value' =>  'klarna'    ,   'status'    =>  true  ,   'section'   =>  5   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_pay_payoneer'      ,   'value' =>  'payoneer'    ,   'status'    =>  true  ,   'section'   =>  5   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_pay_bpay'      ,   'value' =>  'bpay'    ,   'status'    =>  true  ,   'section'   =>  5   ,   'published_on'  =>  $faker->dateTime()  ]);


        // site counters 
        SiteSetting::create(['name'    =>  'site_main_sliders'             ,   'value' =>  3                ,   'status'    =>  true  ,   'section'   =>  6   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_advertisor_sliders'             ,   'value' =>  3                ,   'status'    =>  true  ,   'section'   =>  6   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_card_categories'             ,   'value' =>  3                ,   'status'    =>  true  ,   'section'   =>  6   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_featured_cards'             ,   'value' =>  3                ,   'status'    =>  true  ,   'section'   =>  6   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_random_cards'             ,   'value' =>  3                ,   'status'    =>  true  ,   'section'   =>  6   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_related_cards'             ,   'value' =>  3                ,   'status'    =>  true  ,   'section'   =>  6   ,   'published_on'  =>  $faker->dateTime()  ]); // in card info page 
        SiteSetting::create(['name'    =>  'site_more_like_cards'             ,   'value' =>  3                ,   'status'    =>  true  ,   'section'   =>  6   ,   'published_on'  =>  $faker->dateTime()  ]); // in cart page 
        SiteSetting::create(['name'    =>  'site_bogs'             ,   'value' =>  3                ,   'status'    =>  true  ,   'section'   =>  6   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_questions'             ,   'value' =>  3                ,   'status'    =>  true  ,   'section'   =>  6   ,   'published_on'  =>  $faker->dateTime()  ]);
        SiteSetting::create(['name'    =>  'site_more_categories'             ,   'value' =>  3                ,   'status'    =>  true  ,   'section'   =>  6   ,   'published_on'  =>  $faker->dateTime()  ]);
        


      
    }
}
