<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class IrregularityTypesValidator.
 *
 * @package namespace App\Validators;
 */
class IrregularityTypesValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [

            'name'           =>  'required|max:50',
            'description'    =>  'required|max:250',

        ],
        ValidatorInterface::RULE_UPDATE => [

            'name'           =>  'max:50',
            'description'    =>  'max:250',

        ],
    ];
}
