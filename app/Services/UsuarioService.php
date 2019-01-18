<?php

namespace App\Services;

use App\Exceptions\ValidatorException;
use App\Repositories\UsuarioRepository;
use App\Validators\UsuarioValidator;

class UsuarioService
{
    /**
     * @var UsuarioRepository
     */
    private $repository;
    /**
     * @var UsuarioValidator
     */
    private $validator;

    /**
     * UsuarioService constructor.
     */
    public function __construct(UsuarioRepository $repository, UsuarioValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function query(array $data)
    {
        return $this->repository->search($data);
    }

    public function save(array $data, $id = null)
    {
        if (!$this->validator->validate($data)) {
            throw new ValidatorException($this->validator->getErrors());
        }

        if ($id !== null) {
            return $this->repository->update($data, $id);
        }

        return $this->repository->create($data);
    }
}
