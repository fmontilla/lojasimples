<?php
namespace App\Repositories;

use App\Models\Categoria;
use App\Repositories\Contracts\RepositoryInterface;

/**
 * Class EmpreendimentoRepository
 * @package namespace App\Repositories;
 */
class CategoriaRepository extends Repository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categoria::class;
    }
}
