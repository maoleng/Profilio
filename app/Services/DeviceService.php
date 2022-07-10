<?php

namespace App\Services;

use App\Lib\JWT\JWT;
use App\Models\Admin;
use App\Models\Device;

class DeviceService extends BaseService
{
    protected $model = Device::class;

    public function generateTokenForAdmin(Admin $admin)
    {
        $jwt = c(JWT::class);
        $token = $jwt->encode([
            'id' => $admin->_id,
            'username' => $admin->username,
            'name' => $admin->name,
        ]);
        return $token;
    }

    protected function boot()
    {
        parent::boot();
    }

}
