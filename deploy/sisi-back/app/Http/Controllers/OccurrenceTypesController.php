<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\OccurrenceTypeService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\OccurrenceTypeCreateRequest;
use App\Http\Requests\OccurrenceTypeUpdateRequest;
use App\Repositories\OccurrenceTypeRepository;
use App\Validators\OccurrenceTypeValidator;

/**
 * Class OccurrenceTypesController.
 *
 * @package namespace App\Http\Controllers;
 */
class OccurrenceTypesController extends Controller
{
    use CrudMethods;

    /**
     * @var OccurrenceTypeService
     */
    protected $service;

    /**
     * @var OccurrenceTypeValidator
     */
    protected $validator;

    /**
     * OccurrenceTypesController constructor.
     *
     * @param OccurrenceTypeService $service
     * @param OccurrenceTypeValidator $validator
     */
    public function __construct(OccurrenceTypeService $service,
                                OccurrenceTypeValidator $validator)
    {
        $this->service      = $service;
        $this->validator    = $validator;
    }
}