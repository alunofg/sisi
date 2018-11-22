<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\OccurrenceType;

/**
 * Class OccurrenceTypeTransformer.
 *
 * @package namespace App\Transformers;
 */
class OccurrenceTypeTransformer extends TransformerAbstract
{
    /**
     * Transform the OccurrenceType entity.
     *
     * @param \App\Entities\OccurrenceType $model
     *
     * @return array
     */
    public function transform(OccurrenceType $model)
    {
        return [
            'id'            => (int) $model->id,

            'name'          => $model->name,
            'description'   => $model->description,

            'created_at'    => $model->created_at->toDateTimeString(),
            'updated_at'    => $model->updated_at->toDateTimeString()
        ];
    }
}
