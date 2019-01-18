<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usuario_id','itens','endereco_id','total'
    ];

    public function endereco()
    {
        return $this->belongsTo(Endereco::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
