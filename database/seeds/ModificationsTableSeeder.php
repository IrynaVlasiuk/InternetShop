<?php

use Illuminate\Database\Seeder;
use App\Models\Modification;

class ModificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modification::create([
            'id'   => 1,
            'name' => 'color',
        ]);

        Modification::create([
            'id'   => 2,
            'name' => 'size',
        ]);

        Modification::create([
            'id'   => 3,
            'name' => 'sex',
        ]);

        Modification::create([
            'id'   => 4,
            'name' => 'season',
        ]);
    }
}
