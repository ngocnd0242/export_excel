<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ItemImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_item_image';

        $itemIds = array_pluck(DB::table('t_item')->get(), 'item_id');

        DB::table($table)->truncate();
        $faker = Faker::create();
        for ($i = 1; $i <= 50000; $i++) {
            $arrData[] = [
                'item_image_id' => $i,
                'item_id' => $faker->randomElement($itemIds),
                'size' => $faker->randomElement(['L','M','XL']),
                'url' => $faker->url,
                'width' => rand(300, 500),
                'height' => rand(200, 400),
            ];

            if($i % 500 == 0) {
                DB::table($table)->insert($arrData);
                $arrData = [];
            }
        }
    }
}
