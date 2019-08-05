<?php

use Illuminate\Database\Seeder;
use App\Models\Translation;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Translation::create([
            'id'          => 1,
            'language_id' => 1,
            'value_id'    => 1,
            'value'       => '',
        ]);

        Translation::create([
            'id'          => 2,
            'language_id' => 2,
            'value_id'    => 1,
            'value'       => '',
        ]);

        Translation::create([
            'id'          => 3,
            'language_id' => 3,
            'value_id'    => 1,
            'value'       => '',
        ]);
    }
}
