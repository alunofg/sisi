<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\InvolvedPeopleService;
use App\Validators\InvolvedPersonValidator;

/**
 * Class InvolvedPeopleController.
 *
 * @package namespace App\Http\Controllers;
 */
class InvolvedPeopleController extends Controller
{
    use CrudMethods;

    /**
     * @var InvolvedPeopleService
     */
    protected $service;

    /**
     * @var InvolvedPersonValidator
     */
    protected $validator;

    /**
     * InvolvedPeopleController constructor.
     *
     * @param InvolvedPeopleService $service
     * @param InvolvedPersonValidator $validator
     */
    public function __construct(InvolvedPeopleService $service,
                                InvolvedPersonValidator $validator)
    {
        $this->service   = $service;
        $this->validator = $validator;
    }
}
