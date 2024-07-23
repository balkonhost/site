<?php

namespace App\Events\Domain;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Created
{
    use Dispatchable, SerializesModels;

    public $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
}
