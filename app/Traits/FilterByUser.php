<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait FilterByUser
{
    protected static function bootFilterByUser()
    {
        if(! app()->runningInConsole()) {
            static::creating(function ($model) {
                $model->created_by_id = Auth::getUser()->id;
            });

            $currentUser = Auth::user();
            if (!$currentUser) return;
            $canSeeAllRecordsRoleId = config('quickadmin.can_see_all_records_role_id');
            $modelName = class_basename(self::class);

            if ($currentUser->role_id == $canSeeAllRecordsRoleId && !is_null($canSeeAllRecordsRoleId)) {
                if (Session::get($modelName . '.filter', 'all') == 'my') {
                    Session::put($modelName . '.filter', 'my');
                    $addScope = true;
                } else {
                    Session::put($modelName . '.filter', 'all');
                    $addScope = false;
                }
            } else {
                $addScope = true;
            }

            if ($addScope) {
                static::addGlobalScope('created_by_id', function (Builder $builder) use ($currentUser) {
                    $builder->where('created_by_id', $currentUser->id);
                });
            }
        }
    }
}