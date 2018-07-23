<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AuthorNew extends Model
{
    public $timestamps = false;
    protected $table = 'herba_author';
    protected $fillable = ['id_authorHerba'];
    protected $primaryKey = 'id_authorHerba';

    public function author1()
    {
        return $this->belongsTo('App\Model\AuthorIdent', 'author1_id', 'id_author');
    }

    public function author2()
    {
        return $this->belongsTo('App\Model\AuthorIdent', 'author2_id', 'id_author');
    }

        public function author3()
    {
        return $this->belongsTo('App\Model\AuthorIdent', 'author3_id', 'id_author');
    }

        public function author4()
    {
        return $this->belongsTo('App\Model\AuthorIdent', 'author4_id', 'id_author');
    }

        public function author5()
    {
        return $this->belongsTo('App\Model\AuthorIdent', 'author5_id', 'id_author');
    }

    public function author6()
    {
        return $this->belongsTo('App\Model\AuthorIdent', 'author6_id', 'id_author');
    }

}
