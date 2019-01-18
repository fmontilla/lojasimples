<?php

namespace App\Services;

use App\Exceptions\ValidatorException;
use App\Repositories\EnderecoRepository;
use App\Validators\EnderecoValidator;

class EnderecoService
{
    /**
     * @var EnderecoRepository
     */
    private $repository;
    /**
     * @var EnderecoValidator
     */
    private $validator;

    /**
     * UserService constructor.
     */
    public function __construct(EnderecoRepository $repository, EnderecoValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function query(array $data)
    {
        return $this->repository->search($data);
    }

    public function save(array $data)
    {
        if (!$this->validator->validate($data)) {
            throw new ValidatorException($this->validator->getErrors());
        }

        return $this->repository->create($data);
    }
}
