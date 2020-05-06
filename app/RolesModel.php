<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RolesModel extends Model
{
    protected $table = 'roles';
    protected $fillable = ['name'];
    public $timestamps = false;
}
