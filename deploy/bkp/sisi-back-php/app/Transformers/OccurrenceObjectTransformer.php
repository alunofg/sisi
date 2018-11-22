<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\OccurrenceObject;

/**
 * Class OccurrenceObjectTransformer.
 *
 * @package namespace App\Transformers;
 */
class OccurrenceObjectTransformer extends TransformerAbstract
{
    /**
     * Transform the OccurrenceObject entity.
     *
     * @param \App\Entities\OccurrenceObject $model
     *
     * @return array
     */
    public function transform(OccurrenceObject $model)
    {
        return [
            'id'            => (int) $model->id,

            'description'   => $model->description,

            'created_at'    => $model->created_at->toDateTimeString(),
            'updated_at'    => $model->updated_at->toDateTimeString()
        ];
    }
}
