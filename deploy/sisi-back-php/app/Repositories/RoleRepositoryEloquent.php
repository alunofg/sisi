<?php

namespace App\Repositories;

use App\Presenters\RolePresenter;
use App\Services\Traits\SoftDeletes;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Role;
use App\Validators\RoleValidator;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    use SoftDeletes;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {
        return RoleValidator::class;
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
        return RolePresenter::class;
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
