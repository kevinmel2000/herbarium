<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Duplicate extends Model
{
    public $timestamps= false;

    protected $table = 'duplicate';
    protected $primaryKey = 'id_dupt';
}
