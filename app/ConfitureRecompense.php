<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ConfitureRecompense extends Pivot
{

    protected $table = 'confiture_has_recompense';
    protected $fillable = ['id_confiture', 'id_recompense'];
    public $timestamps = false;
    
    public function confiture()
{
    return $this->belongsTo('App\ConfituresModel');
}
 
public function recompense()
{
    return $this->belongsTo('App\RecompensesModel');
}
}
