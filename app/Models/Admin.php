<?php

namespace App\Models;

use Jenssegers\Mongodb\Relations\HasOne;

class Admin extends Base
{
    protected $table = 'admin';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];

    protected function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = password_hash($value, PASSWORD_BCRYPT);
    }

    public function verify($password): bool
    {
        return password_verify($password, $this->password);
    }

    public function device(): HasOne
    {
        return $this->hasOne(Device::class, 'admin_id', '_id');
    }

}
