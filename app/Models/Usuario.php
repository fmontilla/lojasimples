<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'endereco_id'
    ];

    public function endereco()
    {
        return $this->hasOne(Endereco::class);
    }
}
