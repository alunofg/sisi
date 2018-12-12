<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class OccurrenceTypeValidator.
 *
 * @package namespace App\Validators;
 */
class OccurrenceTypeValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [

            'name'           =>  'required|max:40',
            'description'    =>  'required|max:250',

        ],
        ValidatorInterface::RULE_UPDATE => [

            'name'           =>  'max:40',
            'description'    =>  'max:250',

        ],
    ];
}
