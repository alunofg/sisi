<?php

namespace App\Services;

use App\Repositories\OccurrenceTypeRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class UserService
 *
 * @package App\Services
 */
class OccurrenceTypeService extends AppService
{
    use CrudMethods {
        all as protected processAll;
    }

    /**
     * @var OccurrenceTypeRepository $repository
     */
    protected $repository;

    /**
     * RoleService constructor.
     *
     * @param OccurrenceTypeRepository $repository
     */
    public function __construct(OccurrenceTypeRepository $repository)
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
