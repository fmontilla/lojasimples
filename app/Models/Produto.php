<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome','descricao','imagem_principal','imagens','preco','caracteristicas','categoria_id'
    ];

    protected $casts = [
        'imagens' => 'array',
        'caracteristicas' => 'array'
    ];

}
