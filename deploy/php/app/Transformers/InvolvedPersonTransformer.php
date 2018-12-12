<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\InvolvedPerson;

/**
 * Class InvolvedPersonTransformer.
 *
 * @package namespace App\Transformers;
 */
class InvolvedPersonTransformer extends TransformerAbstract
{
    /**
     * Transform the InvolvedPerson entity.
     *
     * @param \App\Entities\InvolvedPerson $model
     *
     * @return array
     */
    public function transform(InvolvedPerson $model)
    {
        return [
            'id'                    => (int) $model->id,

            'name'                  => $model->name,
            'cpf'                   => $model->cpf,
            'birthdate'             => $model->birthdate,
            'gender'                => $model->gender,
            'skin_color'            => $model->skin_color,
            'type'                  => $model->type,
            'occurrence_type_id'    => $model->occurrence_type_id,

            'created_at'            => $model->created_at->toDateTimeString(),
            'updated_at'            => $model->updated_at->toDateTimeString()
        ];
    }
}
