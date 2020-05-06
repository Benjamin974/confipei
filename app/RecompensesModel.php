<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecompensesModel extends Model
{
    protected $table = 'recompenses';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function confiture()
    {
        return $this->belongsToMany('App\ConfituresModel', 'confiture_has_recompense', 'id_confiture', 'id_recompense');
    }

    public function confiture_recompense()
    {
        return $this->hasMany('App\ConfitureRecompense');
    }
}
