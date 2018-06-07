<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class CoordinationCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_coordination_category';

        $coordParIds = array_pluck(DB::table('t_coordination_category_parent')->get(), 'coord_category_parent_id');
        DB::table($table)->truncate();
        $faker = Faker::create();
        for ($i = 1; $i <= 50; $i++) {
            DB::table($table)->insert([
                'coord_category_id' => $i,
                'coord_category_parent_id' => $faker->randomElement($coordParIds),
                'coord_category_title' => $faker->name,
                'comment' => $faker->text,
                'comment_mb' => $faker->text,
                'view' => 1,
                'sort' => rand(1,50),
                'register_date' => Carbon::now(),
                'update_date' => Carbon::now(),
            ]);
        }
    }
}
