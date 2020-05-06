<?php

namespace App\Http\Controllers;

use App\ConfituresModel;
use App\Http\Resources\ConfituresRessource;
use Illuminate\Http\Request;

class ConfituresController extends Controller
{
    public function index() {
        $dataConfi = ConfituresModel::find(1);
        return new ConfituresRessource($dataConfi);
    }
}
