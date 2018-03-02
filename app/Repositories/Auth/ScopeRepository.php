<?php

namespace App\Repositories\Auth;

use Laravel\Passport\Passport;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\ScopeRepositoryInterface;
use League\OAuth2\Server\Exception\OAuthServerException;
use Laravel\Passport\Bridge\Scope;
use App\Exceptions\ConfigurationException;

class ScopeRepository implements ScopeRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function getScopeEntityByIdentifier($identifier)
    {
        if (Passport::hasScope($identifier)) {
            return new Scope($identifier);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function finalizeScopes(
        array $scopes, $grantType,
        ClientEntityInterface $clientEntity, $userIdentifier = null)
    {
        
        if (is_null($model = config('auth.providers.client.model'))){
            throw new ConfigurationException('Unable to determine client model from configuration.');
        }
        
        $client = (new $model)->find($clientEntity->getIdentifier());
        
        $clientScopes = array_filter(explode(' ', trim($client->scopes)), function ($scope) {
            return !empty($scope);
        });

        $mapScopes = collect($scopes)->map(function($scope) {
            return $scope->getIdentifier();
        });

        collect($clientScopes)->each(function($clientScope) use ( $mapScopes) {

            if(!in_array($clientScope, $mapScopes->toArray())) {
                throw OAuthServerException::invalidScope($clientScope);
            }
        });

        if (! in_array($grantType, ['password', 'personal_access'])) {
            $scopes = collect($scopes)->reject(function ($scope) {
                return trim($scope->getIdentifier()) === '*';
            })->values()->all();
        }

        return collect($scopes)->filter(function ($scope) {
            return Passport::hasScope($scope->getIdentifier());
        })->values()->all();
    }
}
