<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandesModel extends Model
{
    protected $table = 'commandes';
    protected $fillable = ['id', 'id_user', 'id_adresse_livraison', 'id_adresse_facturation'];
    public $timestamps = false;

    public function confiture()
    {
        return $this->belongsToMany('App\ConfituresModel', 'commande_has_confiture', 'id_commande', 'id_confiture');
    }
    function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    function adresseLivraison(){
        return $this->belongsTo(AdressesModel::class,'id_adresse_livraison');
    }

    function adresseFacturation(){
        return $this->belongsTo(AdressesModel::class,'id_adresse_facturation');
    }
}
