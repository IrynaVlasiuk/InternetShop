<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'article'     => 'A111',
            'name'        => 'shorts',
            'price'       => 200,
            'category_id' => 1,
        ]);

        Product::create([
            'article'     => 'A112',
            'name'        => 'jacket',
            'price'       => 300,
            'category_id' => 1,
        ]);

        Product::create([
            'article'     => 'A113',
            'name'        => 'clutch',
            'price'       => 250,
            'category_id' => 2,
        ]);
        Product::create([
            'article'     => 'A114',
            'name'        => 'bag',
            'price'       => 460,
            'category_id' => 2,
        ]);
        Product::create([
            'article'     => 'A115',
            'name'        => 'suit',
            'price'       => 550,
            'category_id' => 3,
        ]);
        Product::create([
            'article'     => 'A116',
            'name'        => 'suit',
            'price'       => 500,
            'category_id' => 3,
        ]);
    }
}
