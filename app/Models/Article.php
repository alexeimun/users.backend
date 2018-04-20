<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'articles';
    //protected $with = ['comments'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code', 'type'];

    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    public function scopeHorror($query) {
        return $query->where('type', 3);
    }

    public function scopePoetry($query) {
        return $query->where('type', 1);
    }

    public function scopeOfType($query, $type) {
        return $query->where('type', $type);
    }

    protected static function boot() {
        parent::boot();

        static::addGlobalScope('type', function (Builder $builder) {
            //$builder->whereType(2);
        });
    }
}