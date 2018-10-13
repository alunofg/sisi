<?php

namespace App\Http\Controllers;

use App\Services\InvolvedPeopleService;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\InvolvedPersonCreateRequest;
use App\Http\Requests\InvolvedPersonUpdateRequest;
use App\Repositories\InvolvedPersonRepository;
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
    public function __construct(InvolvedPeopleService $service, InvolvedPersonValidator $validator)
    {
        $this->service = $service;
        $this->validator  = $validator;
    }
}
