<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_item';
        DB::table($table)->truncate();

        $faker = Faker::create('ja_JP');
        for ($i = 1; $i <=5000; $i++) {
            $arrData[] = [
                'item_id' => $this->generateRandomString(10),
                'view_on_time' => Carbon::now()->subDay(1),
                'sale_on_time' => Carbon::now()->subDay(1),
                'flag1' => rand(1, 2),
                'flag2' => rand(1, 2),
                'magazine_flg' => rand(1, 2),
                'sale_type' => rand(0, 2),
                'view' => 1,
                'view_lang' => 1,
                'remarks' => $faker->realText(10),
                'remarks_lang' => null,
                'item_copy' => null,
                'remarks_lang' => $faker->realText(10),
                'item_copy_lang' => null,
                'item_comment_pc' =>  $faker->realText(10),
                'item_comment_pc_lang' => null,
                'item_comment_mo' =>  $faker->realText(10),
                'image_count' =>  1,
                'keyword' =>  $faker->realText(10),
                'keyword_lang' =>  null,
                'meta' =>  null,
                'tag' =>  null,
                'sort' =>  null,
                'sort' =>  rand(0, 100),
                'online_flag' =>  null,

                'option_1' =>  null,
                'option_1_lang' =>  null,

                'option_2' =>  null,
                'option_2_lang' =>  null,

                'option_3' =>  null,
                'option_3_lang' =>  null,

                'option_4' =>  null,
                'option_4_lang' =>  null,

                'option_5' =>  null,
                'option_5_lang' =>  null,

                'option_6' =>  null,
                'option_6_lang' =>  null,

                'option_7' =>  null,
                'option_7_lang' =>  null,

                'option_8' =>  null,
                'option_8_lang' =>  null,


                'option_9' =>  null,
                'option_9_lang' =>  null,

                'option_10' =>  null,
                'option_10_lang' =>  null,

                'register_date' => Carbon::now(),
                'update_date' => Carbon::now()
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
        for ($i = 0; $i <=$length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
