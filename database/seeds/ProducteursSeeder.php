<?php

use App\CommandesModel;
use App\ConfituresModel;
use App\FruitsModel;
use App\ProducteursModel;
use App\RecompensesModel;
use Illuminate\Database\Seeder;

class ProducteursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProducteursModel::class, 3)->create()
            ->each(function ($u) {
                $u->confiture()->saveMany(
                    factory(ConfituresModel::class, 2)->make()
                )
                    ->each(function ($p) {
                        $p->recompense()->saveMany(factory(RecompensesModel::class, 1)->make());
                    })
                    ->each(function ($f) {
                        $f->fruit()->saveMany(factory(FruitsModel::class, 1)->make());
                    });
            });
    }
}
