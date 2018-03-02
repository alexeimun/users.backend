<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class UserAuthControllerTest extends TestCase {

    use DatabaseMigrations;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp() {

        parent::setUp();

        $this->createPerson();

        $this->createClient();
    }

    // public function test_categories_valid() {

    //     $token = $this->createToken();

    //     $this->user->categories()->create([
    //         'category_id' => '1'
    //     ]); 

    //     $this->user->categories()->create([
    //         'category_id' => '2'
    //     ]);            

    //     $this->json('GET','/v1/users/categories', [] , [
    //         'authorization' => 'Bearer ' .$token
    //     ])->shouldReturnJson()->seeJson(['data' => [
    //         ['category_id' => 1],
    //         ['category_id' => 2]
    //     ]]);

    //     $this->assertResponseOk();

    // }

    // public function test_categories_invalid() {

    //     $token = $this->createToken();

    //     $this->user->categories()->create([
    //         'category_id' => '1'
    //     ]); 

    //     $this->user->categories()->create([
    //         'category_id' => '2'
    //     ]);            

    //     $this->json('GET','/v1/users/categories', [] , [
    //         'authorization' => 'Bearer ' .$token
    //     ])->shouldReturnJson()->seeJson(['data' => [
    //         ['category_id' => 1],
    //         ['category_id' => 3]
    //     ]], true);

    //     $this->assertResponseOk();
    // }

    // public function test_update_categories_invalid() {

    //     $token = $this->createToken();

    //     $this->json('PUT','/v1/users/categories', [] , [
    //         'authorization' => 'Bearer ' .$token
    //     ])->shouldReturnJson();

    //     $this->assertResponseStatus(422);

    // }

    // public function test_update_categories_valid() {

    //     $token = $this->createToken();

    //     $this->json('PUT','/v1/users/categories', 
    //     ['categories' => [1,2,3]] ,
    //     ['authorization' => 'Bearer ' .$token])
    //     ->shouldReturnJson()
    //     ->seeJson(['data' => [
    //         ['category_id' => 1],
    //         ['category_id' => 2],
    //         ['category_id' => 3]
    //     ]]);

    //     $this->seeInDatabase('category_users', [
    //         'user_id' => $this->user->id,
    //         'category_id'    => 1,
    //     ]);

    //     $this->seeInDatabase('category_users', [
    //         'user_id' => $this->user->id,
    //         'category_id'    => 2,
    //     ]);

    //     $this->seeInDatabase('category_users', [
    //         'user_id' => $this->user->id,
    //         'category_id'    => 3,
    //     ]);

    //     $this->assertResponseOk();

    // }

    // public function test_update_categories_delete_valid() {

    //     $token = $this->createToken();

    //     $this->json('PUT','/v1/users/categories',
    //     ['categories' => [1,2,3]], 
    //     ['authorization' => 'Bearer ' .$token])
    //     ->shouldReturnJson()
    //     ->seeJson(['data' => [
    //         ['category_id' => 1],
    //         ['category_id' => 2],
    //         ['category_id' => 3]
    //     ]]);

    //     $this->seeInDatabase('category_users', [
    //         'user_id' => $this->user->id,
    //         'category_id'    => 1,
    //     ]);

    //     $this->seeInDatabase('category_users', [
    //         'user_id' => $this->user->id,
    //         'category_id'    => 2,
    //     ]);

    //     $this->seeInDatabase('category_users', [
    //         'user_id' => $this->user->id,
    //         'category_id'    => 3,
    //     ]);

    //     $this->json('PUT','/v1/users/categories', [
    //         'categories' => [
    //             1,2
    //         ]
    //     ] , 
    //     ['authorization' => 'Bearer ' .$token])->shouldReturnJson()->seeJson(['data' => [
    //         ['category_id' => 1],
    //         ['category_id' => 2]
    //     ]], true);

    //     $this->seeInDatabase('category_users', [
    //         'user_id' => $this->user->id,
    //         'category_id'    => 1,
    //     ]);

    //     $this->seeInDatabase('category_users', [
    //         'user_id' => $this->user->id,
    //         'category_id'    => 2,
    //     ]);

    //     $this->missingFromDatabase('category_users', [
    //         'user_id' => $this->user->id,
    //         'category_id'    => 3,
    //     ]);

    //     $this->assertResponseOk();

    // }

}
