<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_stock';

        DB::table($table)->truncate();
        for ($i = 1; $i <= 10000; $i++) {
            $arrData[] = [
                'mall_id' => 100,
                'sku_code' => $i,
                'stock' => rand(0, 10),
                'del_flag' => 0,
                'update_date' => Carbon::now(),
            ];

            if($i % 500 == 0) {
                DB::table($table)->insert($arrData);
                $arrData = [];
            }
        }
    }
}
