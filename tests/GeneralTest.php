<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class GeneralTest extends TestCase {

    use DatabaseMigrations;

    // public function test_route_not_found(){
    //     $this->json('GET','/')->seeJsonEquals([
    //         'message' => 'Route not found', 
    //         'status_code' => '404'
    //     ]);

    //     $this->assertResponseStatus(404);
    // }

    // public function test_route_method_not_allowed(){
    //     $this->json('GET','/auth/login')->seeJsonEquals([
    //         'status_code' => '405',
    //         'message' => 'Method not allowed' 
    //     ]);

    //     $this->assertResponseStatus(405);
    // }

    // public function test_route_unauthenticated(){

    //     $this->json('GET','/v1/users')->seeJsonEquals([
    //         'status_code' => '401', 
    //         'error' => 'Unauthenticated'
    //     ]);

    //     $this->assertResponseStatus(401);
    // }

    // public function test_route_authentification(){

    //     $token = $this->createToken();

    //     $this->json('GET','/v1/users/', [] , [
    //         'authorization' => 'Bearer ' .$token
    //     ]);

    //     $this->assertResponseOk();

    // }

}