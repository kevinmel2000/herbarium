<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    public $timestamps =false;
    protected $table = 'picture_biotrop';
    protected $primaryKey = 'id_picture';
}
