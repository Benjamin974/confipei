<?php

namespace App\Http\Controllers;

use App\ConfituresModel;
use App\FruitsModel;
use App\Http\Resources\ConfituresRessource;
use App\ProducteursModel;
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
                'fruit' => ''
                
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $donneesBdd = new ConfituresModel;
        $donneesBdd->name = $validator['name'];
        $donneesBdd->prix = $validator['prix'];
        $producteur = ProducteursModel::find($validator['id_producteur']);
        if(!$producteur) {
            return 'error';
        }
        $donneesBdd->producteur()->associate($producteur);
        $donneesBdd->save();

        $fruits = [];
        if(is_array($validator['fruit'])) {
            foreach ($validator['fruit'] as $_fruit) {
                if(isset($_fruit['id'])) {
                    $fruit = FruitsModel::find($_fruit['id']);
                    if(!$fruit) {
                        return 'error fruit';
                    }
                    $fruits[] = $fruit->id;
                } else {
                    return "id existe pas";

                    // On va créer un objet par la suite fruit:{name:''}
                }
            }
        }
        if (!empty($fruits)) {
            $donneesBdd->fruit()->attach($fruits);
        }

        return  new ConfituresRessource($donneesBdd);
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
