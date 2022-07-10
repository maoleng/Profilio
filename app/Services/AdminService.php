<?php

namespace App\Services;

use App\Models\Admin;

class AdminService extends BaseService
{
    protected $model = Admin::class;

    protected function boot()
    {
        parent::boot();

    }

    public function auth($username, $password): ?Admin
    {
        $admin = $this->where('username', $username)->first();
        if ($admin instanceof Admin && $admin->verify($password)) {
            return $admin;
        }
        return null;
    }


}
