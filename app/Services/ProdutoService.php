<?php

namespace App\Services;

use App\Repositories\ProdutoRepository;

class ProdutoService
{
    /**
     * @var ProdutoRepository
     */
    private $repository;

    /**
     * ProdutoService constructor.
     */
    public function __construct(ProdutoRepository $repository)
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
}
