<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    //  // O fillable : Define os campos que podem ser preenchidos em massa
    protected $fillable = ['id', 'titulo', 'autor', 'ano_publicacao'];
}
