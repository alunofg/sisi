<?php

namespace App\Services;

use App\Repositories\OccurrenceReportRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class UserService
 *
 * @package App\Services
 */
class OccurrenceReportService extends AppService
{
    use CrudMethods {
        all as protected processAll;
    }

    /**
     * @var OccurrenceReportRepository $repository
     */
    protected $repository;

    /**
     * RoleService constructor.
     *
     * @param OccurrenceReportRepository $repository
     */
    public function __construct(OccurrenceReportRepository $repository)
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
