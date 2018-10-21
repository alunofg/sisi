<?php

namespace App\Criterias;

use Carbon\Carbon;
use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterByAgencyCriteria
 * @package namespace App\Criteria;
 */
class FilterByDateCriteria extends AppCriteria implements CriteriaInterface
{

    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {

        $from = $this->request->query->get('from');
        $to   = $this->request->query->get('to');

        if ($from == null && $to == null){
            $from = Carbon::now()->startOfMonth();
            $to   = Carbon::now()->endOfMonth();
        } else {
            $from = Carbon::createFromFormat('Y-m-d', $from)->startOfDay();
            $to   = Carbon::createFromFormat('Y-m-d', $to)->endOfDay();
        }

        return $model->where('created_at', '>=', $from)
            ->where('created_at', '<=', $to);

    }
}
