<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    public $timestamps = false;
    protected $table = 'species';
    protected $primaryKey = 'id_species';

    public function genus()
    {
        return $this->belongsTo('App\Model\Genus', 'genus_id','id_genus');
    }

    public function family()
    {
        return $this->belongsTo('App\Model\Family', 'family_id', 'id_family');
    }

    public function character()
    {
        return $this->belongsTo('App\Model\CharacterSpecies' ,'character_id', 'id_character');
    }

    public function venacular()
    {
        return $this->belongsTo('App\Model\Vernacular' ,'vernacular_id', 'id_venacular');
    }
    public function nameNew()
    {
        return $this->belongsTo('App\Model\NameSpeciesNew' ,'nameNew_id', 'id_name');
    }
}
