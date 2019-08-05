<?php

use Illuminate\Database\Seeder;

class CategoryCharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_characteristic')->insert(
            [
                'id' => 1,
                'category_id' => 1,
                'characteristic_id' => 1,
                'value' => 'Armani Jeans'
            ]
        );

        DB::table('category_characteristic')->insert(
            [
                'id' => 2,
                'category_id' => 2,
                'characteristic_id' => 1,
                'value' => 'Louis Vuitton'
            ]
        );

        DB::table('category_characteristic')->insert(
            [
                'id' => 3,
                'category_id' => 3,
                'characteristic_id' => 1,
                'value' => 'Dolce&Gabbana'
            ]
        );
    }
}
