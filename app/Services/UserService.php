<?php

namespace App\Services;

use App\Models\User;

class UserService extends BaseService
{
    protected $model = User::class;

    protected function boot()
    {
        parent::boot();

        User::creating(static function ($model) {

        });
    }
}
