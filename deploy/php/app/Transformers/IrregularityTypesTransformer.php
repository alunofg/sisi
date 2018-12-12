<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\IrregularityType;

/**
 * Class IrregularityTypesTransformer.
 *
 * @package namespace App\Transformers;
 */
class IrregularityTypesTransformer extends TransformerAbstract
{
    /**
     * Transform the IrregularityType entity.
     *
     * @param \App\Entities\IrregularityType $model
     *
     * @return array
     */
    public function transform(IrregularityType $model)
    {
        return [
            'id'            => (int) $model->id,

            'name'          => $model->name,
            'description'   => $model->description,

            'created_at'    => $model->created_at,
            'updated_at'    => $model->updated_at
        ];
    }
}
