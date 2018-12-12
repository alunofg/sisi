<?php

namespace App\Entities;



/**
 * Class InvolvedPerson.
 *
 * @package namespace App\Entities;
 */
class InvolvedPerson extends AppModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cpf',
        'birthdate',
        'gender',
        'skin_color',
        'type',
        'occurrence_report_id'
    ];

    /**
     * The attributes that should be date type.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function occurrence()
    {
        return $this->belongsTo(OccurrenceReport::class);
    }

}
