<?php

namespace App\Services;

use App\Services\EndPoints\Subscriptions;
use GuzzleHttp\Client;

class APIClient {


    /**
     *
     * The guzzle client instance
     *
     * @var Google_Client
     */
    protected $client;

    /**
     * Create a new APIClient instance.
     *
     * @param Google_Client $clientGoole
     *
     * @return void 
     */
    public function __construct(Client $client){
        $this->client = $client;
    }


    /**
     * Set the OAuth 2.0 Redirect URI.
     *
     * @param string $redirectUri
     *
     * @return \App\Services\EndPoints\Subscription
     */
    public function subscriptions(){

        return new Subscriptions($this->client);

    }

    public function errors(){
    	
        return null;
    
    }

}