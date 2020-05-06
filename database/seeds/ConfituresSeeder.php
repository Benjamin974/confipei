<?php

use App\ConfituresModel;
use App\ProducteursModel;
use Illuminate\Database\Seeder;

class ConfituresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ConfituresModel::class, 3)->create();
    }
}
