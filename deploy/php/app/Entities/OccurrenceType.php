<?php

namespace App\Entities;

/**
 * Class OccurrenceType.
 *
 * @package namespace App\Entities;
 */
class OccurrenceType extends AppModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function occurrences()
    {
        return $this->hasMany(OccurrenceReport::class);
    }

}

