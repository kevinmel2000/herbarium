<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Verified extends Model
{
    public $timestamps =false;
    protected $table = 'verified';
    protected $primaryKey = 'id_verified';
}
