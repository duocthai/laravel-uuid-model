<?php

namespace DT\Laravel\Uuid\Behaviors;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

trait CUD
{
    /**
     *  Setup model event hooks
     */
    public static function bootCUD()
    {
        static::creating(function (Model $model) {
            $model->created_at = Carbon::now();
            if (Auth::user()) {
                $model->created_by = Auth::user()->id;
            }
        });

        static::updating(function (Model $model) {
            $model->updated_at = Carbon::now();
            if (Auth::user()) {
                $model->updated_by = Auth::user()->id;
            }
        });

        static::updated(function (Model $model) {
        });

        static::created(function (Model $model) {
        });
    }
}
