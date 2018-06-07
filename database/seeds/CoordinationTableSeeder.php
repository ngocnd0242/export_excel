<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CoordinationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = 't_coordination';
        $coordCatIds = array_pluck(DB::table('t_coordination_category')->get(), 'coord_category_id');
        $shopIds = array_pluck(DB::table('t_shop')->get(), 'shop_id');
        DB::table($table)->truncate();
        $faker = Faker::create('ja_JP');
        for ($i = 1; $i <= 10000; $i++) {
            $arrData[] = [
                'coordination_id' => $i,
                'coord_category_id' => $faker->randomElement($coordCatIds),
                'title' => $faker->name,
                'shop_id' => $faker->randomElement($shopIds),
                'sort' => rand(1, 50),
                'view' => 1,
                'comment_1' => "<font size=\"2\" color=\"#333333\">\n■スタイルポイント<br>\n防寒用のダウンも、インナーをピンクとネイビーにすることでよりオシャレに着こなせます。<br>\n</font>\n<br>\n\n<font size=\"2\" color=\"#333333\">\n■ビジカジ度<br>\nビジネス50％　カジュアル50％<br>\n</font>\n<br>\n<font size=\"2\" color=\"#333333\">\n■モデルデータ<br>\n身長：172cm<br>\n体重： 58kg<br>\nsize：Ｍ着用<br>\n</font>\n<hr>\n<p class=\"gotopBtn nextAction\"><a href=\"/item/coordinate?item_code=127-111227501&color_code=0&t=2\" target=\"_blank\">似た雰囲気のコーディネートをチェック★</a></p>\n<p class=\"gotopBtn nextAction\"><a href=\"/item/pr?pr_id=517\" target=\"_blank\">ビジネス・オフィスカジュアルＱ＆Ａ</a></p>",
                'comment_2' => $faker->realText(10),
                'comment_3' => $faker->realText(10),
                'register_date' => Carbon::now(),
                'update_date' => Carbon::now(),
            ];
            if($i % 500 == 0) {
                DB::table($table)->insert($arrData);
                $arrData = [];
            }

        }
    }
}
