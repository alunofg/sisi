<?php

namespace App\Services;

use App\Repositories\ZoneRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class ZoneService
 *
 * @package App\Services
 */
class ZoneService extends AppService
{
    use CrudMethods {
        all as protected processAll;
    }

    /**
     * @var ZoneRepository $repository
     */
    protected $repository;

    /**
     * RoleService constructor.
     *
     * @param ZoneRepository $repository
     */
    public function __construct(ZoneRepository $repository)
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
