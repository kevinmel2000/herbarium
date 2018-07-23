<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InvasiveAS extends Model
{
    public $timestamps =false;
    protected $table = 'speciment_ias';
    protected $primaryKey = 'id_ias';

    public function species()
    {
        return $this->belongsTo('App\Model\Species', 'species_id', 'id_species');
    }

    public function control()
    {
        return $this->belongsTo('App\Model\ControlIas', 'control_id', 'id_controll');
    }
    
    public function verification()
    {
        return $this->belongsTo('App\Model\Verified', 'verifiedData_id', 'id_verified');
    }

    public function author()
    {
        return $this->belongsTo('App\Model\AuthorIdent', 'author_id', 'id_author');
    }
}
