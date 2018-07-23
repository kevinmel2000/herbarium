<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NameSpeciesNew extends Model
{
    public $timestamps = false;
    protected $table = 'herba_namenew';
    protected $fillable = ['id_name'];
    protected $primaryKey = 'id_name'; 
}
