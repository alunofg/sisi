<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\OccurrenceObjectService;
use App\Validators\OccurrenceObjectValidator;

/**
 * Class OccurrenceObjectsController.
 *
 * @package namespace App\Http\Controllers;
 */
class OccurrenceObjectsController extends Controller
{
    use CrudMethods;

    /**
     * @var OccurrenceObjectService
     */
    protected $service;

    /**
     * @var OccurrenceObjectValidator
     */
    protected $validator;

    /**
     * OccurrenceObjectsController constructor.
     *
     * @param OccurrenceObjectService $service
     * @param OccurrenceObjectValidator $validator
     */
    public function __construct(OccurrenceObjectService $service,
                                OccurrenceObjectValidator $validator)
    {
        $this->service   = $service;
        $this->validator = $validator;
    }

}