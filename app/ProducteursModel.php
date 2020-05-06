<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProducteursModel extends Model
{
    protected $table = 'producteurs';
    protected $fillable = ['id', 'name'];
    public $timestamps = false;

    function confiture()
    {
        return $this->hasMany(ConfituresModel::class, 'id_producteur');
    }
}
