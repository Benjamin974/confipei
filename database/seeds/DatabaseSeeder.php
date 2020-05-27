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
            RolesSeeder::class,
            UsersSeeder::class,
            ProducteursSeeder::class,
            CommandesSeeder::class,
            FruitsSeeder::class,
            
            ]);
    }
}
