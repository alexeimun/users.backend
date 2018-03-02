<?php

namespace App\Repositories;

use App\Models\Cliente;

class ClientesRepository extends Repository {


    public function __construct(Cliente $model){
       $this->model = $model;
    }


}
