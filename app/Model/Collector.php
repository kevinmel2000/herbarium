<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    public $timestamps =false;
    protected $table = 'collector';
    protected $primaryKey = 'id_collector';
}
