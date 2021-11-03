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
        $this->call([
            BasesTableSeeder::class,
            ColorsTableSeeder::class,
            TastesTableSeeder::class,
            TypesTableSeeder::class,
            MethodsTableSeeder::class,
            CocktailsTableSeeder::class,
            NotesTableSeeder::class
        ]);
    }
}
