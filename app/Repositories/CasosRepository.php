<?php

    namespace App\Repositories;

    use App\Models\Caso;

    class CasosRepository extends Repository
    {
        public function __construct(Caso $model)
        {
            $this->model = $model;
        }
    }
