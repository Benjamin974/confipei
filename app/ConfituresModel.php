<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfituresModel extends Model
{
    protected $table = 'confitures';
    protected $fillable = ['id', 'name','image', 'prix', 'id_producteur' ];
    public $timestamps = false;

    function producteur()
    {
        return $this->belongsTo(ProducteursModel::class, 'id_producteur');
    }
    
    public function recompense()
    {
        return $this->belongsToMany('App\RecompensesModel', 'confiture_has_recompense', 'id_confiture', 'id_recompense');
    }

    public function fruit()
    {
        return $this->belongsToMany('App\FruitsModel', 'confiture_has_fruit', 'id_confiture', 'id_fruit');
    }
}
