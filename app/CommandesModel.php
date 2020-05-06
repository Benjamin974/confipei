<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommandesModel extends Model
{
    protected $table = 'commandes';
    protected $fillable = ['id'];
    public $timestamps = false;

    public function confiture()
    {
        return $this->belongsToMany('App\ConfituresModel', 'commande_has_confiture', 'id_commande', 'id_confiture');
    }
}
