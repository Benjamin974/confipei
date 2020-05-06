<?php

use App\CommandesModel;
use App\ConfituresModel;
use Illuminate\Database\Seeder;

class CommandesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CommandesModel::class, 3)->create()
        ->each(function($u) {
            $u->confiture()->saveMany(factory(ConfituresModel::class, 1)->make());
        });
    }
}
