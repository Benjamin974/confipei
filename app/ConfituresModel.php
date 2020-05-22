<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfituresModel extends Model
{
    protected $table = 'confitures';
    protected $fillable = ['id', 'name', 'prix', 'id_producteur', 'id_photo'];
    public $timestamps = false;

    function producteur()
    {
        return $this->belongsTo(ProducteursModel::class, 'id_producteur');
    }
    function photo()
    {
        return $this->belongsTo(PhotosModel::class, 'id_photo');
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
