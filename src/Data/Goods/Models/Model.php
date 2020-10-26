<?php

namespace Wxfallstar\LaravelShop\Data\Goods\Models;

use Illuminate\Database\Eloquent\Model as Models;

class Model extends Models
{
    //
    public function __construct(array $attributes = [])
    {
        $this->setConnection(config('data.goods.database.connection.name'));
        parent::__construct($attributes);
    }
}
