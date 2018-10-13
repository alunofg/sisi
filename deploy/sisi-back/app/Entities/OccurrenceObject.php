<?php

namespace App\Entities;


/**
 * Class OccurrenceObject.
 *
 * @package namespace App\Entities;
 */

class OccurrenceObject extends AppModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

       protected $fillable = [
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

}
