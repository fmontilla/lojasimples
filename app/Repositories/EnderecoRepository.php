<?php
namespace App\Repositories;

use App\Models\Endereco;
use App\Repositories\Contracts\RepositoryInterface;

/**
 * Class EnderecoRepository
 * @package namespace App\Repositories;
 */
class EnderecoRepository extends Repository implements RepositoryInterface
{

    public function search(array $data)
    {
        $query = $this->model->newQuery();

        return $query->get();
    }

    function model()
    {
        return Endereco::class;
    }
}
