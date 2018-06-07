<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_brand';
        DB::table($table)->truncate();
        $faker = Faker::create('ja_JP');
        for ($i = 1; $i <=4; $i++) {
            DB::table($table)->insert([
                'brand_id' => '0'.$i,
                'brand_name' => $faker->name,

                'brand_name_lang' => null,

                'comment' => null,
                'comment_lang' =>  null,
                'option_1' => null,
                'option_1_lang' => null,

                'option_2' => null,
                'option_2_lang' => null,

                'option_3' => null,
                'option_3_lang' => null,

                'option_4' => null,
                'option_4_lang' => null,

                'option_5' => null,
                'option_5_lang' => null,
                'sort' => null,
                'view' => 1,
                'view_lang' => 1,

                'register_date' => Carbon::now(),
                'update_date' => Carbon::now()
            ]);
        }
    }
}
