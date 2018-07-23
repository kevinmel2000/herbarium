<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
   
    public $timestamps = false ;
    protected $table = 'districts';
    protected $primaryKey = 'id_district';

    public function city()
    {
        return $this->belongsTo('App\Model\City', 'city_id', 'id_city');
    }
}
