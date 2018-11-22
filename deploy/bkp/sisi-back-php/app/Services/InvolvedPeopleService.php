<?php

namespace App\Services;

use App\Repositories\InvolvedPersonRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class UserService
 *
 * @package App\Services
 */
class InvolvedPeopleService extends AppService
{
    use CrudMethods {
        all as protected processAll;
    }

    /**
     * @var InvolvedPersonRepository $repository
     */
    protected $repository;

    /**
     * RoleService constructor.
     *
     * @param InvolvedPersonRepository $repository
     */
    public function __construct(InvolvedPersonRepository $repository)
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
