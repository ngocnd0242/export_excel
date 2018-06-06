<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_category';

        DB::table($table)->truncate();
        $faker = Faker::create('ja_JP');
        for ($i = 1; $i <= 50; $i++) {
            $arrData[] = [
                'category_id' => $i,
                'category_name' => $faker->name,
                'category_name_lang' => $faker->name,
                'comment' => $faker->realText(10),
                'comment_lang' => $faker->realText(10),
                'option_1' => $faker->realText(10),
                'option_1_lang' => $faker->realText(10),
                'option_2' => $faker->realText(10),
                'option_2_lang' => $faker->realText(10),
                'option_3' => $faker->realText(10),
                'option_3_lang' => $faker->realText(10),
                'option_4' => $faker->realText(10),
                'option_4_lang' => $faker->realText(10),
                'option_5' => $faker->realText(10),
                'option_5_lang' => $faker->realText(10),
                'sort' => null,
                'view' => 1,
                'view_lang' => null,
                'register_date' => Carbon::now(),
                'update_date' => Carbon::now(),
            ];

            if($i % 5 == 0) {
                DB::table($table)->insert($arrData);
                $arrData = [];
            }
        }
    }
}
