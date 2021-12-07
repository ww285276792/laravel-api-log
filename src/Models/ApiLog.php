<?php

namespace Luffy\ApiLog\Models;

use Illuminate\Database\Eloquent\Model;

class ApiLog extends Model
{
    protected $guarded = [];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        if (!isset($this->table)) {
            $this->setTable(config('api-log.table_name'));
        }

        parent::__construct($attributes);
    }
}
