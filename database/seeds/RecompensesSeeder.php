<?php

use App\RecompensesModel;
use Illuminate\Database\Seeder;

class RecompensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RecompensesModel::class, 3)->create();
    }
}
