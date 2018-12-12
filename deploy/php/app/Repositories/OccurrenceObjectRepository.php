<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OccurrenceObjectRepository.
 *
 * @package namespace App\Repositories;
 */
interface OccurrenceObjectRepository extends RepositoryInterface
{
    /**
     * Encontra um registro deletado
     *
     * @param int $id
     * @param array $columns
     * @param bool $skipPresenter
     */
    public function findDeleted($id, $columns = ['*'], $skipPresenter = false);

    /**
     * Recupera um registro apagado
     *
     * @param int $id
     */
    public function restore($id);

    /**
     * Apaga um um registro completamente
     *
     * @param int $id
     */
    public function forceDelete($id);
}
