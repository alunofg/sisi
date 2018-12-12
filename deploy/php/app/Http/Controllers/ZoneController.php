<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\ZoneService;
use App\Validators\ZoneValidator;

/**
 * Class ZoneController.
 *
 * @package namespace App\Http\Controllers;
 */
class ZoneController extends Controller
{
    use CrudMethods;

    /**
     * @var ZoneService
     */
    protected $service;

    /**
     * @var ZoneValidator
     */
    protected $validator;

    /**
     * UsersController constructor.
     *
     * @param ZoneService $service
     * @param ZoneValidator $validator
     */
    public function __construct(ZoneService $service,
                                ZoneValidator $validator)
    {
        $this->service   = $service;
        $this->validator = $validator;
    }
}
