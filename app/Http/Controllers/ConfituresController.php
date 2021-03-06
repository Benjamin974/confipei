<?php

namespace App\Http\Controllers;

use App\CommandesModel;
use App\ConfituresModel;
use App\FruitsModel;
use App\Http\Resources\CommandesResource;
use App\Http\Resources\ConfituresRessource;
use App\Http\Resources\ProducteursRessource;
use App\ProducteursModel;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ConfituresController extends Controller
{
    public function index()
    {
        $dataConfi = ConfituresModel::with([
            'recompense',
            'fruit',
        ])->get();
        return ConfituresRessource::collection($dataConfi);
    }

    public function indexProd()
    {
        $dataProducteur = ProducteursModel::all();
        return ProducteursRessource::collection($dataProducteur);
    }

    public function addOrUpdateProduct(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'prix' => 'required',
                'id_producteur' => 'required',
                'fruit' => '',
                'id' => ''


            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $confiture = ConfituresModel::with(['producteur', 'fruit'])->find($validator['id']);


        if (!$confiture) {
            $dataConfiture = new ConfituresModel;
        } else {
            $dataConfiture = $confiture;
        }

        if (isset($dataConfiture)) {

            $dataConfiture->name = $validator['name'];

            $dataConfiture->prix = $validator['prix'];

            $producteur = ProducteursModel::find($validator['id_producteur']);
            if (!$producteur) {
                return 'error';
            }
            $dataConfiture->producteur()->associate($producteur);

            $img = $request->get('image');
            $exploded = explode(",", $img);
            if (str::contains($exploded[0], 'gif')) {
                $ext = 'gif';
            } else if (str::contains($exploded[0], 'png')) {
                $ext = 'png';
            } else {
                $ext = 'jpg';
            }

            if (empty($ext)) {
                return 'error';
            }
            $decode = base64_decode($exploded[1]);
            $filename = str::random() . "." . $ext;
            $path = public_path() . "/storage/imgs/" . $filename;
            if (file_put_contents($path, $decode)) {
                $dataConfiture->image = "/storage/imgs/" . $filename;
            }

            $dataConfiture->save();

            $clientFruits = $validator['fruit'];
            $confiFruits = []; //stocké les id de la table pivot
            $toDetach = [];
            $toAttach = [];
            $idClientFruits = [];


            foreach ($clientFruits as $_clientFruits) {
                $idClientFruits[] = $_clientFruits['id']; // {{id, nom}, id}
            }

            // je veux {id}

            if ($confiture && isset($confiture->fruit)) {
                foreach ($confiture->fruit as $_fruit) {
                    $confiFruits[] = $_fruit->id;
                }
            }

            // on verifie les ids présent
            foreach ($confiFruits as $id) {
                if (!in_array($id, $idClientFruits)) {
                    $toDetach[] = $id;
                }
            }

            // on verifie les ressemblance
            foreach ($idClientFruits as $id) {
                if (!in_array($id, $confiFruits)) {
                    $toAttach[] = $id;
                }
            }

            if (!empty($toDetach)) {
                $dataConfiture->fruit()->detach($toDetach);
            }

            if (!empty($toAttach)) {
                $dataConfiture->fruit()->attach($toAttach);
            }

            return new ConfituresRessource($dataConfiture);
        }
    }


    public function autoComplete(Request $request)
    {


        if ($request->get('query')) {
            $query = $request->get('query');
            $users = FruitsModel::where('name', 'like', '%' . $query . '%')->get();
            return $users;
        }
    }

    public function addConfituresProducteur(Request $request, $id)
    {
        $dataConfi = ConfituresModel::where('id_producteur', '=', $id)->get();
        return ConfituresRessource::collection($dataConfi);
    }

    public function addConfituresProducteurName(Request $request, $id)
    {
        $dataConfi = ProducteursModel::find($id);
        return new ProducteursRessource($dataConfi);
    }

    public function getOfProdcteur(Request $request)
    {
        $user = $request->user();
        $confitures = ConfituresModel::with(['fruit'])->whereHas('producteur', function (Builder $query) use ($user) {
            $query->where('id_user', '=', $user->id);
        })->get();
        return $confitures;
    }

    public function addOrUpdateOfProducteur(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'prix' => 'required',
                'fruit' => '',
                'id' => ''


            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $confiture = ConfituresModel::with(['producteur', 'fruit'])->find($validator['id']);


        if (!$confiture) {
            $dataConfiture = new ConfituresModel;
        } else {
            $dataConfiture = $confiture;
        }

        if (isset($dataConfiture)) {

            $dataConfiture->name = $validator['name'];

            $dataConfiture->prix = $validator['prix'];

            if (isset($validator['id_producteur'])) {
                if ($confiture && isset($confiture->producteur) && $validator['id_producteur'] != $confiture->producteur->id) {
                } else {
                    $producteur = ProducteursModel::find($validator['id_producteur']);
                    if (!$producteur) {
                        return 'error';
                    }
                    $dataConfiture->producteur()->associate($producteur);
                }
            } else {

                if (!isset($validator['id'])) {
                    $user = $request->user();
                    $producteur = ProducteursModel::where('id_user', '=', $user->id)->first();
                    if (!$producteur) {
                        return 'err';
                    }
                    $dataConfiture->producteur()->associate($producteur);
                }
            }

            $img = $request->get('image');
            $exploded = explode(",", $img);
            if (str::contains($exploded[0], 'gif')) {
                $ext = 'gif';
            } else if (str::contains($exploded[0], 'png')) {
                $ext = 'png';
            } else {
                $ext = 'jpg';
            }

            if (empty($ext)) {
                return 'error';
            }
            $decode = base64_decode($exploded[1]);
            $filename = str::random() . "." . $ext;
            $path = public_path() . "/storage/imgs/" . $filename;
            if (file_put_contents($path, $decode)) {
                $dataConfiture->image = "/storage/imgs/" . $filename;
            }

            $dataConfiture->save();

            $clientFruits = $validator['fruit'];
            $confiFruits = []; //stocké les id de la table pivot
            $toDetach = [];
            $toAttach = [];
            $idClientFruits = [];


            foreach ($clientFruits as $_clientFruits) {
                $idClientFruits[] = $_clientFruits['id']; // {{id, nom}, id}
            }

            // je veux {id}

            if ($confiture && isset($confiture->fruit)) {
                foreach ($confiture->fruit as $_fruit) {
                    $confiFruits[] = $_fruit->id;
                }
            }

            // on verifie les ids présent
            foreach ($confiFruits as $id) {
                if (!in_array($id, $idClientFruits)) {
                    $toDetach[] = $id;
                }
            }

            // on verifie les ressemblance
            foreach ($idClientFruits as $id) {
                if (!in_array($id, $confiFruits)) {
                    $toAttach[] = $id;
                }
            }

            if (!empty($toDetach)) {
                $dataConfiture->fruit()->detach($toDetach);
            }

            if (!empty($toAttach)) {
                $dataConfiture->fruit()->attach($toAttach);
            }

            return new ConfituresRessource($dataConfiture);
        }
    }
}
