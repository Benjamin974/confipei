<?php

namespace App\Http\Controllers;

use App\AdressesModel;
use App\CommandesModel;
use App\ConfituresModel;
use App\Http\Resources\CommandesResource;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommandeController extends Controller
{
    public function commander(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'order' => 'required',
                'adresseLivraison' => 'required',
                'adresseFacturation' => 'required'
            ],
            [
                'required' => 'Le champs :attribute est requis', // :attribute renvoie le champs / l'id de l'element en erreure
            ]
        )->validate();

        $user = $request->user();
        DB::beginTransaction();
        try {
            if ($user) {
                $createCommande = new CommandesModel();
                $user = $this->addUserToOrder($user, $createCommande);
                $this->addAdresseLivraison($validator['adresseLivraison'], $createCommande, $user);
                $this->addAdresseFacturation($validator['adresseFacturation'], $createCommande, $user);
                $createCommande->save();
                $this->addConfituresToCommande($validator['order'], $createCommande);
            }
        } catch (Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        DB::commit();
        return new CommandesResource($createCommande);
    }

    public function addConfituresToCommande($basket, &$commande) {
        foreach ($basket as $_commande) {
            $quantite = $_commande['quantite'];
            $idConfiture = $_commande['id'];
            $confiture = ConfituresModel::find($idConfiture);
            if (!$confiture) {
                throw new Exception('Produits incorrect');
            }
            $commande->confiture()->attach($confiture, ['quantite' => $quantite]);
        }
    }

    function addUserToOrder($user, &$commande)
    {
        $user = User::where('id', '=', $user->id)->first();
        if (!$user) {
            throw new Exception('Pas connecté');
        }
        $commande->user()->associate($user);
        return $user;
    }

    function addAdresseLivraison($adresse, &$commande, $user)
    {
        $adresse = $this->createAdresse($adresse, $user);
        $commande->adresseLivraison()->associate($adresse);
    }

    function addAdresseFacturation($adresse, &$commande, $user)
    {
        $adresse = $this->createAdresse($adresse, $user);
        $commande->adresseFacturation()->associate($adresse);
    }

    function createAdresse($_adresse, $user)
    {
        $adresse =  new AdressesModel;
        $adresse->nom = $_adresse['nom'];
        $adresse->prenom = $_adresse['prenom'];
        $adresse->pays = $_adresse['pays'];
        $adresse->ville = $_adresse['ville'];
        $adresse->code_postal = $_adresse['code_postal'];
        $adresse->adresse = $_adresse['adresse'];
        $adresse->user()->associate($user);
        $adresse->save();
    }
}
