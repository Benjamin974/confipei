<?php

namespace App\Http\Controllers;

use App\ConfituresModel;
use App\FruitsModel;
use App\Http\Resources\ConfituresRessource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ConfituresController extends Controller
{
    public function index()
    {
        $dataConfi = ConfituresModel::with([
            'recompense',
            'fruit'
        ])->get();
        return ConfituresRessource::collection($dataConfi);
    }

    public function addProduct(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'prix' => 'required',
                'id_producteur' => 'required',
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $donneesBdd = ConfituresModel::create(
            $validator
        )->save();

        return $validator;
    }

    public function autoComplete(Request $request)
    {

        
        if ($request->get('query')) {
            $query = $request->get('query');
            $users = FruitsModel::where('name', 'like', '%' . $query . '%')->get();
            return response()->json($users);

        }
    }

    public function viewFruits() {
        return FruitsModel::all();
    }
}
