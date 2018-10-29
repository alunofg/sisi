<?php

namespace App\Services;

use App\Repositories\OccurrenceTypeRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class UserService
 *
 * @package App\Services
 */
class IrregularityTypesService extends AppService
{
    use CrudMethods

    {
        all as protected processAll;
    }

    /**
     * @var IrregularityTypesService $repository
     */
    protected $repository;

    /**
     * RoleService constructor.
     *
     * @param IrregularityTypesService $repository
     */
    public function __construct(IrregularityTypesService $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $limit
     * @return array|mixed
     */
    public function all($limit = 20)
    {
        $this->repository
            ->resetCriteria()
            ->pushCriteria(app('App\Criterias\AppRequestCriteria'));

        return $this->processAll($limit);
    }
}
