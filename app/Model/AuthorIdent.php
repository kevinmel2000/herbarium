<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AuthorIdent extends Model
{
    public $timestamps = false;
    protected $table = 'author_identification';
    protected $fillable = ['name_author', 'date_ident'];
    protected $primaryKey = 'id_author';
}
