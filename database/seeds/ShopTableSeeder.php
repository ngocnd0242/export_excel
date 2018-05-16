<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_shop';
        DB::table($table)->truncate();
        $faker = Faker::create();
        for ($i = 1; $i <=3; $i++) {
            DB::table($table)->insert([
                'shop_id' => $i,
                'shop_area_id' => rand(1, 3),
                'shop_name' => $faker->name,
                'shop_name_lang' => $faker->name,
                'short_name' => $faker->name,
                'short_name_lang' => $faker->name,
                'area' => null,
                'zipcode' => null,
                'prefecture_code' => null,
                'address1' => null,
                'address2' => null,
                'address1_lang' => null,
                'phone' => $faker->phoneNumber,
                'email' => $faker->email,
                'time' => null,
                'shop_map_swf' => null,
                'gmap_address' => null,
                'map_img_ext' => null,
                'comment' => null,
                'comment_lang' => null,
                'comment2' => null,
                'comment2_lang' => null,
                'comment3' => null,
                'comment3_lang' => null,
                'comment4' => null,
                'comment4_lang' => null,
                'comment5' => null,
                'comment5_lang' => null,
                'sort' => null,
                'view' => rand(1,2),
                'view_lang' => 1,
                'register_date' => Carbon::now(),
                'update_date' => Carbon::now(),
            ]);
        }
    }
}
