<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PedidoResource extends JsonResource
{
    public function toArray($request)
    {
        $data = $this->resource->toArray();
        $resource = [
            'id' => array_get($data,'id'),
            'itens' => array_get($data,'itens')
        ];

        return $resource;
    }
}
