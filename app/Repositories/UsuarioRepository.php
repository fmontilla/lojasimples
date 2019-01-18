<?php
namespace App\Repositories;

use App\Models\Usuario;
use App\Repositories\Contracts\RepositoryInterface;

/**
 * Class UsuarioRepository
 * @package namespace App\Repositories;
 */
class UsuarioRepository extends Repository implements RepositoryInterface
{

    public function search(array $data)
    {
        $query = $this->model->newQuery();

        return $query->get();
    }

    function model()
    {
        return Usuario::class;
    }
}
