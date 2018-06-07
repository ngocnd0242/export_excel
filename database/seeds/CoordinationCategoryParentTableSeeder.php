<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class CoordinationCategoryParentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_coordination_category_parent';
        DB::table($table)->truncate();
        $faker = Faker::create();
        for ($i = 1; $i <= 50; $i++) {
            DB::table($table)->insert([
                'coord_category_parent_id' => $i,
                'coord_category_parent_title' => $faker->name,
                'comment_pc' => $faker->text,
                'comment_mb' => $faker->text,
                'view' => 1,
                'sort' => rand(1,50),
                'register_date' => Carbon::now(),
                'update_date' => Carbon::now(),
            ]);
        }
    }
}
