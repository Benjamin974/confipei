<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FruitsModel extends Model
{
    protected $table = 'fruits';
    protected $fillable = ['name', 'username', 'email'];
    public $timestamps = false;

    public function confiture()
    {
        return $this->belongsToMany('App\ConfituresModel', 'confiture_has_fruit', 'id_confiture', 'id_fruit');
    }
}
