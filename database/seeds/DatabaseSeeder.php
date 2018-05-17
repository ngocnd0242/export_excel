<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        Coordination
        $this->call(BrandTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(CoordinationCategoryParentTableSeeder::class);
        $this->call(CoordinationCategoryTableSeeder::class);
        $this->call(CoordinationTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(CoordinationItemTableSeeder::class);
        $this->call(ItemTableSeeder::class);
        $this->call(SkuTableSeeder::class);

//        Item: sku, product, brand, item_image, season
        $this->call(SeasonTableSeeder::class); //Option
        $this->call(ItemImageTableSeeder::class); //Option
        $this->call(CategoryTableSeeder::class);
        $this->call(SubCategoryTableSeeder::class);
        $this->call(StockTableSeeder::class);
    }
}
