<?php

namespace App\Services;

use App\Entities\Logs;
use App\Repositories\LogsRepository;
use App\Services\Traits\CrudMethods;
use App\Repositories\UserRepository;

/**
 * Class LogsService
 *
 * @package App\Services
 */
class LogsService extends AppService
{
    use CrudMethods {
        all     as public processAll;
    }

    /**
     * @var LogsRepository $repository
     */
    protected $repository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $repository
     *
     */
    public function __construct(LogsRepository $repository)
    {
        $this->repository       = $repository;
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

    /**
     * @param array $data
     * @return mixed
     */
    public static function write($action, $type, $id)
    {
        $user = UserService::getUser (true);

        return Logs::create([
            'action'        => $action . " " . $type . " " . $id,
            'user_id'       => $user ? $user->id : null,
            'loggable_id'   => $id,
            'loggable_type' => $type,
        ]);
    }
}
