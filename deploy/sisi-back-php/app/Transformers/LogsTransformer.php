<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Logs;

/**
 * Class LogsTransformer.
 *
 * @package namespace App\Transformers;
 */
class LogsTransformer extends TransformerAbstract
{
    /**
     * Transform the Logs entity.
     *
     * @param \App\Entities\Logs $model
     *
     * @return array
     */
    public function transform(Logs $model)
    {
        return [
            'id'                => (int) $model->id,
            'action'            => $model->action,
            'user'              => [
                'id'    => $model->id,
                'name'  => $model->name
            ],

            'created_at'        => $model->created_at->toDateTimeString(),
            'updated_at'        => $model->updated_at->toDateTimeString()
        ];
    }
}
