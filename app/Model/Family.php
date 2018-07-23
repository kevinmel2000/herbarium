<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{

    public $timestamps = false;
    protected $table = 'family';

    protected $primaryKey = 'id_family';
    
}
