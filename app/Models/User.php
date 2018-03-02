<?php

namespace App\Models;

use App\Traits\HasApiTokens;
use App\Traits\ValidatePermissions;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract {

    use Authenticatable, Authorizable, HasApiTokens, ValidatePermissions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'email_verification', 'image', 'profile_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'person_id', 'created_at', 'updated_at', 'code', 'active'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['offline_id', 'subscription'];

    /**
     * Get person info.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person() {

        return $this->belongsTo('App\Models\Person');
    }

    public function categories() {

        return $this->hasMany('App\Models\CategoryUser');
    }

    public function courses() {

        return $this->hasMany('App\Models\CourseUser');
    }

    public function permissions() {
        return $this->belongsToMany('App\Models\Permission', 'users_permissions');
    }

    public function history() {
        return $this->hasMany('App\Models\UserHistory');
    }

    /**
     * Valid email of user
     *
     * @return void
     */
    public function validateEmail() {
        $this->email_verification = true;
        $this->code = null;
        $this->save();
    }

    /**
     * Get offlineId for user.
     *
     * @return boolean
     */
    protected function getOfflineIdAttribute() {

        return hash('md5', $this->password) . hash('md5', $this->email);
    }

    protected function getSubscriptionAttribute() {
        return Subscription::find($this->id);
    }

}