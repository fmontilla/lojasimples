<?php

namespace App\Services;

use App\Repositories\CategoriaRepository;

class CategoriaService
{
    /**
     * @var CategoriaRepository
     */
    private $repository;

    /**
     * CategoriaService constructor.
     */
    public function __construct(CategoriaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function query(array $data)
    {
        return $this->repository->search($data);
    }

    public function get()
    {
        return $this->repository->all();
    }
}
