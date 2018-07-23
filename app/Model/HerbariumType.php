<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HerbariumType extends Model
{
    public $timestamps =false;
    protected $table = 'herbarium_type';
    protected $primaryKey = 'id_type';
}
