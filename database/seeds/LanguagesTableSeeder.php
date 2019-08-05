<?php

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'id'   => 1,
            'name' => 'EN',
        ]);

        Language::create([
            'id'   => 2,
            'name' => 'FR',
        ]);

        Language::create([
            'id'   => 3,
            'name' => 'UA',
        ]);
    }
}
