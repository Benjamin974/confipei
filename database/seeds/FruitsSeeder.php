<?php

use App\FruitsModel;
use Illuminate\Database\Seeder;

class FruitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FruitsModel::class, 2)->create();
    }
}
