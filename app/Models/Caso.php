<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model {

    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Casos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ["id", "numero_caso", "descripcion", "fecha_creacion", "cliente_id", "asesor_id"];

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function asesor() {
        return $this->belongsTo('App\Models\Asesor');
    }

}