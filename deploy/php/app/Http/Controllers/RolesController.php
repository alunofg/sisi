<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\CrudMethods;
use App\Services\RoleService;
use App\Validators\RoleValidator;

/**
 * Class RolesController.
 *
 * @package namespace App\Http\Controllers;
 */
class RolesController extends Controller
{
    use CrudMethods;

    /**
     * @var RoleService
     */
    protected $service;

    /**
     * @var RoleValidator
     */
    protected $validator;

    /**
     * RolesController constructor.
     *
     * @param RoleService $service
     * @param RoleValidator $validator
     */
    public function __construct(RoleService $service,
                                RoleValidator $validator)
    {
        $this->service   = $service;
        $this->validator = $validator;
    }

}