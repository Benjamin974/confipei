<?php

use App\ConfitureRecompense;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfitureRecompenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ConfitureRecompense::class, 3)->create();
    }
}
