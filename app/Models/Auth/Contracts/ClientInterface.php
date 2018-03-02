<?php

namespace App\Models\Auth\Contracts;

interface ClientInterface {

    /**
     *
     * Get necessary permissions for authentification with client
     *
     * @return array
     */
    public function getPermissionsArray();

}