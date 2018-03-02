<?php

namespace App\Repositories\Auth;

use Illuminate\Contracts\Hashing\Hasher;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\UserRepositoryInterface;
use League\OAuth2\Server\Exception\OAuthServerException;
use Laravel\Passport\Bridge\User;
use App\Exceptions\ConfigurationException;

class UserRepository implements UserRepositoryInterface
{
    /**
     * The hasher implementation.
     *
     * @var \Illuminate\Contracts\Hashing\Hasher
     */
    protected $hasher;

    /**
     * Create a new repository instance.
     *
     * @param  \Illuminate\Contracts\Hashing\Hasher  $hasher
     * @return void
     */
    public function __construct(Hasher $hasher)
    {
        $this->hasher = $hasher;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserEntityByUserCredentials($username, $password, $grantType, ClientEntityInterface $clientEntity)
    {
        if (is_null($model = config('auth.providers.users.model'))) {
            throw new ConfigurationException('Unable to determine user model from configuration.');
        }

        $user = (new $model)->where('email', $username)->first();

        if (! $user ||  !$this->hasher->check($password, $user->password)) {
            return;
        } 

        // validate permissions user with client.

        if (is_null($model = config('auth.providers.client.model'))){
            throw new ConfigurationException('Unable to determine client model from configuration.');
        }

        $client = (new $model)->find($clientEntity->getIdentifier());

        if(!$user->validatePermissions($client->getPermissionsArray())){
            throw OAuthServerException::accessDenied();
        }



        return new User($user->getAuthIdentifier());
    }
}
