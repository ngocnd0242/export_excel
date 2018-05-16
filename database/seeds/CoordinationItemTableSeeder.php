<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CoordinationItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_coordination_item';
        $coordinationIds = array_pluck(DB::table('t_coordination')->get(), 'coordination_id');

        $itemCode = array_pluck(DB::table('t_product')->get(), 'item_code');
        DB::table($table)->truncate();
        $faker = Faker::create();
        for ($i = 1; $i <= 50000; $i++) {
            $arrData[] = [
                'coordination_item_no' => $i,
                'coordination_id' => $faker->randomElement($coordinationIds),
                'item_code' => $faker->randomElement($itemCode),
                'color_code' => $faker->randomElement(["L","M","XL"]),
                'size_code' => rand(1, 50),
                'sort' => rand(1, 50),
                'view' => rand(1, 2),
                'register_date' => Carbon::now(),
                'update_date' => Carbon::now(),
            ];

            if($i % 500 == 0){
                DB::table($table)->insert($arrData);
                $arrData = [];
            }
        }
    }

}
