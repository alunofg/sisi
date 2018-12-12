<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use App\Scopes\OrderByNewerScope;

/**
 * Class AppModel
 * @package App\Entities
 */
class AppModel extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new OrderByNewerScope());
    }

    /**
     * Scopes
     */
}
