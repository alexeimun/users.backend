<?php

namespace App\Models\Auth;

use App\Models\Auth\Contracts\ClientInterface;
use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Client extends Model implements ClientInterface {

    use UuidTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'oauth_clients';

    /**
     * The guarded attributes on the model.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['secret',];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'string', 'personal_access_client' => 'bool', 'password_client' => 'bool', 'revoked' => 'bool',];

    /**
     * Get all of the authentication codes for the client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function authCodes() {
        return $this->hasMany(AuthCode::class);
    }

    /**
     * Get all of the tokens that belong to the client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tokens() {
        return $this->hasMany(Token::class);
    }

    /**
     * Determine if the client is a "first party" client.
     *
     * @return bool
     */
    public function firstParty() {
        return $this->personal_access_client || $this->password_client;
    }

    /**
     * {@inheritdoc}
     */
    public function getPermissionsArray() {
        return array_filter(explode(',', $this->permissions));
    }

    /**
     * {@inheritdoc}
     */
    public function getScopesArray() {
        return array_filter(explode(' ', $this->scopes));
    }

}