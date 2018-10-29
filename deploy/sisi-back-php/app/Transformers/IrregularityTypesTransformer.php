<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\IrregularityTypes;

/**
 * Class IrregularityTypesTransformer.
 *
 * @package namespace App\Transformers;
 */
class IrregularityTypesTransformer extends TransformerAbstract
{
    /**
     * Transform the IrregularityTypes entity.
     *
     * @param \App\Entities\IrregularityTypes $model
     *
     * @return array
     */
    public function transform(IrregularityTypes $model)
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
