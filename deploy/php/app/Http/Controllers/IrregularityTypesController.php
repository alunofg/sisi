<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;


use App\Services\IrregularityTypesService;
use App\Validators\IrregularityTypesValidator;

/**
 * Class IrregularityTypesController.
 *
 * @package namespace App\Http\Controllers;
 */
class IrregularityTypesController extends Controller
{
    use CrudMethods;

    /**
     * @var IrregularityTypesService
     */
    protected $service;

    /**
     * @var IrregularityTypesValidator
     */
    protected $validator;

    /**
     * IrregularityTypesController constructor.
     * @param IrregularityTypesService $service
     * @param IrregularityTypesValidator $validator
     */
    public function __construct(IrregularityTypesService $service,
                                IrregularityTypesValidator $validator)
    {
        $this->service   = $service;
        $this->validator = $validator;
    }

}