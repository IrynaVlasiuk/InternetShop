<?php

use Illuminate\Database\Seeder;

class ProductModificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_modification')->insert(
            [
                'id'              => 1,
                'product_article' => 'A115',
                'modification_id' => 1,
                'value'           => 'red',
            ]
        );

        DB::table('product_modification')->insert(
            [
                'id'              => 2,
                'product_article' => 'A116',
                'modification_id' => 1,
                'value'           => 'black',
            ]
        );

        DB::table('product_modification')->insert(
            [
                'id'              => 3,
                'product_article' => 'A115',
                'modification_id' => 3,
                'value'           => 'female',
            ]
        );

        DB::table('product_modification')->insert(
            [
                'id'              => 4,
                'product_article' => 'A116',
                'modification_id' => 3,
                'value'           => 'male',
            ]
        );

        DB::table('product_modification')->insert(
            [
                'id'              => 5,
                'product_article' => 'A111',
                'modification_id' => 2,
                'value'           => 40,
            ]
        );

        DB::table('product_modification')->insert(
            [
                'id'              => 6,
                'product_article' => 'A112',
                'modification_id' => 2,
                'value'           => 42,
            ]
        );

        DB::table('product_modification')->insert(
            [
                'id'              => 7,
                'product_article' => 'A111',
                'modification_id' => 4,
                'value'           => 'spring/summer',
            ]
        );

        DB::table('product_modification')->insert(
            [
                'id'              => 8,
                'product_article' => 'A112',
                'modification_id' => 4,
                'value'           => 'autumn/winter',
            ]
        );
    }
}
