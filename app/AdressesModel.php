<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdressesModel extends Model
{
    protected $table = 'adresses';
    protected $fillable = ['id', 'nom', 'prenom', 'pays', 'ville', 'adresse', 'code_postal', 'id_user'];

    function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    function commandeLivraison(){
        return $this->hasMany(CommandesModel::class,'id_adresse_livraison');
    }

    function commandeFacturation(){
        return $this->hasMany(CommandesModel::class,'id_adresse_facturation');
    }
}
