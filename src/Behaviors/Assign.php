<?php

namespace DT\Laravel\Uuid\Behaviors;

use Illuminate\Database\Eloquent\Model;

trait Assign
{
    /**
     *  Setup model event hooks
     */
    public static function bootAssign()
    {
        static::creating(function (Model $model) {
            if (blank($model->id)) {
                $model->id = (string) \Illuminate\Support\Str::orderedUuid();
            }
        });
    }
}
