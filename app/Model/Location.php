<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $timestamps= false;
    protected $table = 'location';
    protected $primaryKey = 'id_location';

    public function districts()
    {
        return $this->belongsTo('App\Model\District', 'district_id', 'id_districts');
    }
    
}
