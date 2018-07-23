<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $timestamps= false;

    protected $table = 'state';
    protected $primaryKey = 'id_state';
   // protected $fillable = ['name'];


}
