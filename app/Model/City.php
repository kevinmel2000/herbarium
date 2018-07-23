<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps= false;
    protected $table = 'city';
    protected $primaryKey = 'id_city';

    public function prov()
    {
        return $this->belongsTo('App\Model\Province', 'prov_id', 'id_prov');
    }
}
