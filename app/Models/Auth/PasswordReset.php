<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model {

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = 'email';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'token'];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

}