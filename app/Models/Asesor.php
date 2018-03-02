<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model {

    public $timestamps = false;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Asesores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["id", "cedula", "nombre", "usuario", "clave",];

    public function casos() {
        return $this->hasMany('App\Models\Casos');
    }
}