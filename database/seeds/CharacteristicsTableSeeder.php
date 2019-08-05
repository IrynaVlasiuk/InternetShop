<?php

use App\Models\Characteristic;
use Illuminate\Database\Seeder;

class CharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Characteristic::create([
            'id'    => 1,
            'name'  => 'brand',
        ]);
    }
}
