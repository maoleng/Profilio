<?php

namespace App\Models;

class User extends Base
{
    protected $table = 'users';

    protected $fillable = [
        'email', 'name'
    ];

}
