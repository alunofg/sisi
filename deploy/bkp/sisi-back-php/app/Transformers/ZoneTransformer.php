<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Zone;

/**
 * Class ZoneTransformer.
 *
 * @package namespace App\Transformers;
 */
class ZoneTransformer extends TransformerAbstract
{
    /**
     * Transform the Zone entity.
     *
     * @param \App\Entities\Zone $model
     *
     * @return array
     */
    public function transform(Zone $model)
    {
        return [
            'id'                    => (int) $model->id,

            'name'                  => $model->name,
            'description'           => $model->description,

            'created_at'            => $model->created_at->toDateTimeString(),
            'updated_at'            => $model->updated_at->toDateTimeString()
        ];
    }
}
