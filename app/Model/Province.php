<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    
    public $timestamps= false;
    protected $table = 'province';
    protected $primaryKey = 'id_prov';

    public function state()
    {
        return $this->belongsTo('App\Model\State', 'state_id', 'id_state');
    }
}
