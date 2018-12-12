<?php

namespace App\Services;

use App\Repositories\AttachmentsRepository;
use App\Services\Traits\CrudMethods;

/**
 * Class UserService
 *
 * @package App\Services
 */
class AttachmentsService extends AppService
{
    use CrudMethods {
        all as protected processAll;
    }

    /**
     * @var AttachmentsRepository $repository
     */
    protected $repository;

    /**
     * RoleService constructor.
     *
     * @param AttachmentsService $repository
     */
    public function __construct(AttachmentsService $repository)
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
