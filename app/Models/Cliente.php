<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

    public $timestamps = false;
    protected $with = ['casos'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Clientes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["cedula", "nombre", "direccion", "telefono", "updated_at"];

    public function casos() {
        return $this->hasMany('App\Models\Caso');
    }

}