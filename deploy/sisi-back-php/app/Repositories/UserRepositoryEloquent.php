<?php

namespace App\Repositories;

use App\Presenters\UserPresenter;
use App\Services\Traits\SoftDeletes;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Entities\User;
use App\Validators\UserValidator;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'cpf',
        'email',
        'gender',
        'skin_color',
    ];

    /**
     * @var array
     */
    protected $fieldsRules = [
        'id'            => ['numeric', 'max:2147483647'],
        'cpf'           => ['numeric'],
        'email'         => ['max:150'],
        'gender'        => ['max:150'],
        'skin_color'    => ['max:150'],
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return mixed
     */
    public function presenter()
    {
        return UserPresenter::class;
    }

    /**
     * Find data by id
     *
     * @param int $id
     * @param array $columns
     * @param bool $skipPresenter
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function findDeleted($id, $columns = ['*'], $skipPresenter = false)
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->skipPresenter($skipPresenter)->model->withTrashed()->findOrFail($id, $columns);
        $this->resetModel();

        return $this->parserResult($model);
    }

    /**
     * Deleta o usuário completamente
     *
     * @param int $id
     * @return bool|null
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function forceDelete($id)
    {
        /** @var User $model */
        $model = $this->findDeleted($id, ['id'], true);

        $model->information()->forceDelete();

        return $model->forceDelete();
    }
    
}
