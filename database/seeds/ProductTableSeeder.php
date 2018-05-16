<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_product';
        $brandIds = array_pluck(DB::table('t_brand')->get(), 'brand_id');
        DB::table($table)->truncate();
        $faker = Faker::create();
        for ($i = 1; $i <= 10000; $i++) {
            $arrData[] = [
                'item_code' => $this->generateRandomString(),
                'item_name' => $faker->name,
                'item_name_lang' => $faker->name,
                'item_name_kana' => $faker->randomElement(["L","M","XL"]),
                'brand_id' => $faker->randomElement($brandIds),
                'category_id' => rand(1, 10),
                'category_id2' => rand(10, 20),
                'category_id3' => rand(20, 30),
                'category_id4' => rand(30, 40),
                'category_id5' => rand(40, 50),
                'sub_category_id' => rand(1, 10),
                'sub_category_id2' => rand(10, 20),
                'sub_category_id3' => rand(20, 30),
                'sub_category_id4' => rand(30, 40),
                'sub_category_id5' => rand(40, 50),
                'year_code' => null,
                'season_code' => null,
                'floor_type' => null,
                'size_comment' => $faker->text,
                'size_comment_lang' => $faker->text,
                'material' => null,
                'material_lang' => null,
                'origin_country' => null,
                'origin_country_lang' => null,
                'member_limited' => null,
                'register_date' => Carbon::now(),
                'update_date' => Carbon::now(),
            ];

            if($i % 500 == 0) {
                DB::table($table)->insert($arrData);
                $arrData = [];
            }
        }
    }


    function generateRandomString($length = 10) {
        $characters = '-0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
