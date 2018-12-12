<?php

namespace App\Services;

use App\Services\Traits\CrudMethods;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserService
 *
 * @package App\Services
 */
class UserService extends AppService
{
    use CrudMethods {
        all     as public processAll;
        create  as public processCreate;
        update  as public processUpdate;
    }

    /**
     * @var UserRepository $repository
     */
    protected $repository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $repository
     *
     */
    public function __construct(UserRepository $repository)
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
    public function create(array $data)
    {
        $data['name']     = ucwords(strtolower($data['name']));
        $data['email']    = strtolower($data['email']);
        $data['password'] = bcrypt($data['password']);
        return $this->processCreate($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return array|mixed
     */
    public function update(array $data, $id)
    {
        if (isset($data['name'])) {
            $data['name'] = ucwords(strtolower($data['name']));
        }

        if (isset($data['email'])) {
            $data['email'] = strtolower($data['email']);
        }

        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        return $this->processUpdate($data, $id);
    }

    /**
     * @param bool $object
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public static function getUser($object = false)
    {
        if ($object) {
            return Auth::user();
        } else {
            $user = Auth::user();
            return $user->email;
        }
    }
}
