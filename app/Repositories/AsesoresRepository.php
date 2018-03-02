<?php

namespace App\Repositories;

use App\Models\Asesor;

class AsesoresRepository extends Repository {

    public function __construct(Asesor $model) {
        $this->model = $model;
    }
}
