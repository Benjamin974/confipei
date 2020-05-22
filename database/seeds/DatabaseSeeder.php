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
        // $this->call(UserSeeder::class);
        $this->call([
            PhotosSeeder::class,
            RolesSeeder::class,
            ProducteursSeeder::class,
            UsersSeeder::class,
            CommandesSeeder::class,
            FruitsSeeder::class,
            
            ]);
    }
}
