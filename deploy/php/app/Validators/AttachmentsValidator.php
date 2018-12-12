<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class AttachmentsValidator.
 *
 * @package namespace App\Validators;
 */
class AttachmentsValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
//            'url'              => 'required|max:250',
//            'attachable_type'  => 'required|max:20',
//            'user_id'          => 'required|max:20',
//            'attachable_id'    => 'required|max:20',
        ],

        ValidatorInterface::RULE_UPDATE => [
//            'url'              => 'max:250',
//            'attachable_type'  => 'max:20',
//            'user_id'          => 'max:20',
//            'attachable_id'    => 'max:20',
        ],
    ];
}
