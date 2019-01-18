<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
{
    public function toArray($request)
    {
//        $data = $this->resource->toArray();
        $resource = [
            'id' => $this->id,
            'nome' => $this->name,
            'descricao' => $this->descricao,
            'imagem_principal' => $this->imagem_principal,
            'imagens' => json_decode($this->imagens),
            'preco' => $this->preco,
            'caracteristicas' => $this->caracteristicas,
            'categoria_id' => $this->cadegoria_id,
        ];

        return $resource;
    }
}
