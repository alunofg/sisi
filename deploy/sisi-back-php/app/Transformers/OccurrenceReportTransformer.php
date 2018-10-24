<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\OccurrenceReport;

/**
 * Class OccurrenceReportTransformer.
 *
 * @package namespace App\Transformers;
 */
class OccurrenceReportTransformer extends TransformerAbstract
{
    /**
     * Transform the OccurrenceReport entity.
     *
     * @param \App\Entities\OccurrenceReport $model
     *
     * @return array
     */
    public function transform(OccurrenceReport $model)
    {

        return [
            'id'                    => (int) $model->id,

            'title'                 => $model->title,
            'story'                 => $model->story,
            'occurrence_date'       => $model->occurrence_date,
            'occurrence_time'       => $model->occurrence_time,
            'coordinates'           => $model->coordinates,
            'police_report'         => $model->police_report,
            'estimated_loss'        => $model->estimated_loss,
            'status'                => $model->status,
            'involved_people'       => $this->getInvolvedPeople($model),
            'occurrence_objects'    => $this->getOccurrenceObjects($model),
            'user'                  => [
                'id'            => $model->user->id,
                'name'          => $model->user->name,
                'cpf'           => $model->user->cpf,
                'cellphone'     => $model->user->cellphone,
                'email'         => $model->user->email
            ],
            'agent'                 => $this->getAgent($model),
            'occurrence_type'       => [
                'id'            => $model->type->id,
                'name'          => $model->type->name,
                'description'   => $model->type->description,
            ],
            'zone'                  => [
                'id'            => $model->zone->id,
                'name'          => $model->zone->name,
                'description'   => $model->zone->description,
            ],

            'created_at'            => $model->created_at->toDateTimeString(),
            'updated_at'            => $model->updated_at->toDateTimeString()
        ];
    }

    /**
     * Return agent
     *
     * @param OccurrenceReport $model
     * @return array
     */
    private function getAgent(OccurrenceReport $model)
    {
        $agent = null;
        if(isset($model->agent_id)) {
            $agent = [
                'id'        => $model->agent->id,
                'name'      => $model->agent->name,
                'cpf'       => $model->agent->cpf,
                'cellphone' => $model->agent->cellphone,
                'email'     => $model->agent->email
            ];
        }

        return $agent;
    }

    /**
     * @param OccurrenceReport $model
     * @return array
     */
    private function getInvolvedPeople(OccurrenceReport $model)
    {
        $involvedPeople = [];
        if(isset($model->involvedPeople)) {
            foreach($model->involvedPeople as $person) {
                $involvedPeople[] = [
                    'id'            => $person->id,
                    'name'          => $person->name,
                    'cpf'           => $person->cpf,
                    'birthdate'     => $person->birthdate,
                    'gender'        => $person->gender,
                    'skin_color'    => $person->skin_color,
                    'type'          => $person->type,
                ];
            }
        }

        return $involvedPeople;
    }

    private function getOccurrenceObjects(OccurrenceReport $model)
    {
        $occurrenceObjects = [];
        if(isset($model->objects)) {
            foreach($model->objects as $object) {
                $occurrenceObjects[] = [
                    'id'            => $object->id,
                    'description'   => $object->description,
                ];
            }
        }

        return $occurrenceObjects;
    }
}
