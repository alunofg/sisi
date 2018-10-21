<?php

namespace App\Services;

use App\Repositories\OccurrenceObjectRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class UserService
 *
 * @package App\Services
 */
class OccurrenceObjectService extends AppService
{
    use CrudMethods {
        all as protected processAll;
    }

    /**
     * @var OccurrenceObjectRepository $repository
     */
    protected $repository;

    /**
     * RoleService constructor.
     *
     * @param OccurrenceObjectRepository $repository
     */
    public function __construct(OccurrenceObjectRepository $repository)
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
