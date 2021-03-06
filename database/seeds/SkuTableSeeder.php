<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SkuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_sku';
        $itemIds = array_pluck(DB::table('t_item')->get(), 'item_id');
        $itemCode = array_pluck(DB::table('t_product')->get(), 'item_code');
        $colorCode = array_pluck(DB::table('t_color')->get(), 'color_code');

        DB::table($table)->truncate('ja_JP');
        $faker = Faker::create();
        for ($i = 1; $i <= 10000; $i++) {
            $arrData[] = [
                'sku_id' => $i,
                'sku_code' => $i,
                'item_code' => $faker->randomElement($itemCode),
                'item_id' => $faker->randomElement($itemIds),
                'sire_code' => rand(1, 10),
                'jan_code' => rand(1, 10),
                'size_code' => rand(1, 10),
                'color_code' => $faker->randomElement($colorCode),
                'gedai' => rand(1, 10),
                'gedai_lang' => rand(1, 10),
                'teika' => rand(1, 10),
                'teika_lang' => rand(1, 10),
                'baika1' => rand(1, 10),
                'baika1_lang' => rand(1, 10),
                'baika2' => rand(1, 10),
                'baika2_lang' => rand(1, 10),
                'stock' => rand(1, 100),
                'sort' => rand(1, 100),
                'view' => 1,
                'view_lang' => 1,
                'rearrival_flag' => rand(1, 2),
                'sku_notes' => $faker->realText(10),
                'sku_notes_lang' => $faker->realText(10),
                'register_date' => Carbon::now(),
                'update_date' => Carbon::now()
            ];

            if($i % 500 == 0) {
                DB::table($table)->insert($arrData);
                $arrData = [];
            }
        }
    }

}
