<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Genus extends Model
{
    
    public $timestamps= false;
    protected $table = 'genus';
    protected $primaryKey = 'id_genus';
    
    public function family()
    {
        return $this->belongsTo('App\Model\Family', 'family_id', 'id_family');
    }
}
