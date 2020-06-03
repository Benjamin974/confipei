<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProducteursRessource;
use App\ProducteursModel;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index(Request $request, $id) {
        $dataProd = ProducteursModel::where('id_user', '=', $id)->get();
        return ProducteursRessource::collection($dataProd);
    }
}
