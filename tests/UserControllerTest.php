<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class UserControllerTest extends TestCase {

    use DatabaseMigrations;

    // public function test_user_all(){

    //     $this->withoutMiddleware();

    //     factory(App\Models\Person::class,10)->create()->each(function ($person) {
    //         $person->user()->save(factory(App\Models\User::class)->make());
    //     });

    //     $this->json('GET','v1/users/')->shouldReturnJson();

    //     $count = count(json_decode($this->response->getContent(), true)['data']);

    //     $this->assertEquals(10, $count);

    //     $this->assertResponseOk();

    // }

    // public function test_user_show(){

    //     $this->withoutMiddleware();

    //     factory(App\Models\Person::class)->create()->user()->save(factory(App\Models\User::class)->make([
    //             'email' => 'showTest@aulasamigas.com'
    //     ]));            

    //     $this->json('GET','v1/users/1')
    //          ->shouldReturnJson()
    //          ->seeJson(['email' => 'showTest@aulasamigas.com']);

    //     $this->assertResponseOk();
    // }

    // public function test_user_show_not_found(){

    //     $this->withoutMiddleware();

    //     $this->json('GET','v1/users/1')
    //          ->shouldReturnJson()
    //          ->seeJsonEquals([
    //             'msg' => 'Model not found', 
    //             'status_code' => '404'
    //         ]);

    //     $this->assertResponseStatus(404);

    // }

    // public function test_user_profile(){

    //     $token = $this->createToken();

    //     $this->json('GET','/v1/users/profile', [] , [
    //         'authorization' => 'Bearer ' .$token
    //     ])->shouldReturnJson()
    //       ->seeJson(['email' => 'auth_user@aulasamigas.com']);

    //     $this->assertResponseOk();

    // }

    // public function test_user_showMd5(){

    //     $this->withoutMiddleware();

    //     $user = factory(App\Models\Person::class)->create()->user()->save(factory(App\Models\User::class)->make([
    //             'email' => 'showTest@aulasamigas.com'
    //     ]));            

    //     $this->json('GET','v1/users/md5/' . md5($user->id))
    //          ->shouldReturnJson()
    //          ->seeJson(['email' => 'showTest@aulasamigas.com']);

    //     $this->assertResponseOk();
    // }

    // public function test_users_searchMd5(){

    //     $this->withoutMiddleware();

    //     $ids = [];

    //     factory(App\Models\Person::class,20)->create()->each(function($person) use (&$ids){

    //         $user = $person->user()->save(factory(App\Models\User::class)->make());
    //         $ids[] = md5($user->id);

    //     });            

    //     $query = implode(',',$ids);

    //     $this->json('GET','v1/users/md5?users=' . $query)
    //          ->shouldReturnJson();

    //     $count = count(json_decode($this->response->getContent(), true)['data']);

    //     $this->assertEquals(20, $count);

    //     $this->assertResponseOk();
    // }

    // public function test_users_searchEmail(){

    //     $this->withoutMiddleware();

    //     $emails = [];

    //     factory(App\Models\Person::class,20)->create()->each(function($person) use (&$emails){

    //         $user = $person->user()->save(factory(App\Models\User::class)->make());
    //         $emails[] = $user->email;

    //     });            

    //     $query = implode(',',$emails);

    //     $this->json('GET','v1/users/email?users=' . $query)
    //          ->shouldReturnJson();

    //     $count = count(json_decode($this->response->getContent(), true)['data']);

    //     $this->assertEquals(20, $count);

    //     $this->assertResponseOk();
    // }

}