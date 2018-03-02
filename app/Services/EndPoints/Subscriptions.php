<?php

namespace App\Services\EndPoints;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Subscriptions {
    
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
     *  Find register for model with id
     *  
     *  @param int $id
     * 
     *  @return array|null
     */
    public function find($id){

        try {
           return json_decode($this->client->request('GET', 'subscriptions/user/' .rawurlencode($id), [
                'headers' => [
                   'Content-Type' =>  'application/json',
                   'Connection'   =>  'close',
                   'Expect100Continue' => false
                ]
            ])->getBody());
        } catch (ClientException $e) {
            return null;
        }

    }

}