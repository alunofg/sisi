<?php

namespace App\Services\Traits;

trait SoftDeletes
{
    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function restore($id)
    {
        $model = new $this->model();
        $model = $model->onlyTrashed()->findOrFail($id);

        if(!$model->restore()) {
            throw new \Exception('No restored');
        }

        return $model;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function forceDelete($id)
    {
        $model = $this->findDeleted($id, ['id'], true);

        return $model->forceDelete();
    }

    /**
     * Find data by id
     *
     * @param       $id
     * @param array $columns
     *
     * @return mixed
     */
    public function findDeleted($id, $columns = ['*'], $skipPresenter = false)
    {
        $this->applyCriteria();
        $this->applyScope();
        $model = $this->skipPresenter($skipPresenter)->model->withTrashed()->findOrFail($id, $columns);
        $this->resetModel();

        return $this->parserResult($model);
    }
}