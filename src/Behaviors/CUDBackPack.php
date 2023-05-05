<?php

namespace DT\Laravel\Uuid\Behaviors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

trait CUDBackPack
{
    /**
     *  Setup model event hooks
     */
    public static function bootCUDBackPack()
    {
        static::creating(function (Model $model) {
            $model->created_at = Carbon::now();
            if (backpack_user()) {
                $model->created_by = backpack_user()->id;
            }
        });

        static::updating(function (Model $model) {
            $model->updated_at = Carbon::now();
            if (backpack_user()) {
                $model->updated_by = backpack_user()->id;
            }
        });

        static::updated(function (Model $model) {
        });

        static::created(function (Model $model) {
        });
    }
}
