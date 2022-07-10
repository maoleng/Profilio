<?php

namespace App\Lib\Builder;

use Jenssegers\Mongodb\Eloquent\Model;

abstract class NewModel extends Model
{
    protected function newBaseQueryBuilder(): NewBuilder
    {
        $connection = $this->getConnection();

        return new NewBuilder($connection, $connection->getPostProcessor());
    }
}
