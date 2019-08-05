<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id'    => 1,
            'name'  => 'jeans clothes',
        ]);

        Category::create([
            'id'    => 2,
            'name'  => 'bags',
        ]);

        Category::create([
            'id'    => 3,
            'name'  => 'suits',
        ]);
    }

}
