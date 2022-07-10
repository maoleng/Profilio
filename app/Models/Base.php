<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

abstract class Base extends Model
{
    use HasFactory;

    protected $raw = [];

    public function fill(array $attributes): Base
    {
        $this->raw = $attributes;
        return parent::fill($attributes);
    }

    public function getRaw(string $name, $default = null)
    {
        return $this->raw[$name] ?? $default;
    }

}
