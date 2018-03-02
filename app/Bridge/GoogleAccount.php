<?php

namespace App\Bridge;

use Illuminate\Contracts\Hashing\Hasher;

use \Google_Client;
use \Google_Service_Oauth2;

class GoogleAccount {

    /**
     *
     * The google client instance
     *
     * @var Google_Client
     */
    protected $client;

    /**
     *
     * The google service oauth instance
     *
     * @var Google_Service_Oauth2
     */
    protected $serviceOauth;

    /**
     * Create a new GoogleClient instance.
     *
     * @param Google_Client $clientGoole
     *
     * @return void 
     */
    public function __construct(\Google_Client $client, \Google_Service_Oauth2 $serviceOauth){
        
        $this->client = $client;
        
        $this->serviceOauth = $serviceOauth;
    }

  /**
   * Set the OAuth 2.0 Redirect URI.
   *
   * @param string $redirectUri
   *
   * @return void
   */
    public function setRedirectUri($redirectUri){

        $this->client->setRedirectUri($redirectUri);

    }

    /**
     *
     * get user info for google account 
     *
     * @param string $code
     *
     * @return Google_Service_Oauth2_Userinfoplus|null
     */
    public function user($code){

        $this->client->authenticate($code);

        if($this->client->getAccessToken()){

            return $this->serviceOauth->userinfo->get();
            
        }
    }

}
