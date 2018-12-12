<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Traits\CrudMethods;
use App\Services\LogsService;
use App\Validators\LogsValidator;
/**
 * Class LogsController.
 *
 * @package namespace App\Http\Controllers;
 */
class LogsController extends Controller
{
    use CrudMethods;

    /**
     * @var LogsValidator
     */
    protected $validator;

    /** @var  */
    protected $service;

    /**
     * LogsController constructor.
     *
     * @param LogsValidator $validator
     * @param LogsService $service
     */
    public function __construct(LogsValidator $validator, LogsService $service)
    {
        $this->validator  = $validator;
        $this->service    = $service;
    }
}
