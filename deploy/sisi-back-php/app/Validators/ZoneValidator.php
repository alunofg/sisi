<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class ZoneValidator.
 *
 * @package namespace App\Validators;
 */
class ZoneValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'          => 'required|max:40',
            'description'   => 'required|max:100',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'          => 'max:40',
            'description'   => 'max:100',
        ],
    ];
}
