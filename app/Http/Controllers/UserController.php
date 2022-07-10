<?php

namespace App\Http\Controllers;

use App\Services\UserService;

class UserController extends BaseController
{
    public function getService()
    {
        return c(UserService::class);
    }

    public function create()
    {
        $this->getService()->create([
            'name' => 'record moi nhat',
            'email' => 'vdnvjkn@gnsdjkg.com'
        ]);
    }
}
