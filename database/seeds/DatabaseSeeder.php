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
         $this->call(CategoriesTableSeeder::class);
         $this->call(ProductsTableSeeder::class);
         $this->call(ModificationsTableSeeder::class);
         $this->call(ProductModificationTableSeeder::class);
         $this->call(CharacteristicsTableSeeder::class);
         $this->call(CategoryCharacteristicsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
    }
}
