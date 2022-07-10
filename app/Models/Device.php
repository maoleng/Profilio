<?php

namespace App\Models;

use Jenssegers\Mongodb\Relations\BelongsTo;

class Device extends Base
{
    protected $table = 'device';

    protected $fillable = [
        'device_id', 'token', 'user_id', 'admin_id',
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id', '_id');
    }
}
