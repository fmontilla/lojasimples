<?php
namespace App\Repositories;

use App\Models\Produto;
use App\Repositories\Contracts\RepositoryInterface;

/**
 * Class EmpreendimentoRepository
 * @package namespace App\Repositories;
 */
class ProdutoRepository extends Repository implements RepositoryInterface
{
    public function search(array $data)
    {
        $query = $this->model->newQuery();

        return $query->get();
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Produto::class;
    }
}
