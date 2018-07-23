<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CharacterSpecies extends Model
{
    public $timestamps = false;
    protected $table = 'characteristic_species';
    protected $primaryKey = 'id_character';
}
