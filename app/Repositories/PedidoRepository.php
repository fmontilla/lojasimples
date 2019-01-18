<?php
namespace App\Repositories;

use App\Models\Pedido;
use App\Repositories\Contracts\RepositoryInterface;

/**
 * Class PedidoRepository
 * @package namespace App\Repositories;
 */
class PedidoRepository extends Repository implements RepositoryInterface
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
        return Pedido::class;
    }
}
