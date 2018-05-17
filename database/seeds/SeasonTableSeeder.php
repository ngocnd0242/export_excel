<?php

use Illuminate\Database\Seeder;

class SeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_season';

        DB::table($table)->truncate();

        $arrData = [
            'season_code' => "01",
            'season_name' => "AW",
            'register_date' => \Carbon\Carbon::now(),
            'update_date' => \Carbon\Carbon::now(),
        ];

        DB::table($table)->insert($arrData);
    }
}
