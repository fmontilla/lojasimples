<?php

namespace App\Services;

use App\Repositories\PedidoRepository;
use App\Repositories\ProdutoRepository;

class PedidoService
{
    /**
     * @var ProdutoRepository
     */
    private $repository;

    /**
     * ProdutoService constructor.
     */
    public function __construct(PedidoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function query(array $data)
    {
        return $this->repository->search($data);
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }

    public function save(array $data)
    {
        try {
            \DB::beginTransaction();
            $usuario = app(UsuarioService::class);
            $createUsuario = $usuario->save($data);
            $data['usuario_id'] = $createUsuario->id;

            $endereco = app(EnderecoService::class);
            $createEndereco = $endereco->save($data['endereco']);
            $data['endereco_id'] = $createEndereco->id;

            $usuario->save($data,$data['usuario_id']);

            $data['itens'] = json_encode($data['itens']);
            $this->repository->create($data);
            \DB::commit();

            return true;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
