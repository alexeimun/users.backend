<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class AuthControllerTest extends TestCase {

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

    // public function test_authentificate()
    // {
    //     $this->json('POST','/auth/login',[
    //         'client_id'     =>  $this->client->id,
    //         'client_secret' =>  $this->client->secret,
    //         'username'      =>  $this->user->email,
    //         'password'      =>  'secret'
    //     ])->shouldReturnJson()->seeJson(['token_type' => 'Bearer']);

    //     $this->assertResponseOk();

    // }

    // public function test_authentificate_invalid_credentials()
    // {
    //     $this->json('POST','/auth/login',[
    //         'client_id'     =>  $this->client->id,
    //         'client_secret' =>  $this->client->secret,
    //         'username'      =>  'test@invalid.com',
    //         'password'      =>  'fail-password'
    //     ])->shouldReturnJson()->seeJson(['error' => 'invalid_credentials']);

    //     $this->assertResponseStatus(401);
    // }

    // public function test_authentificate_invalid_client()
    // {
    //     $this->json('POST','/auth/login',[
    //         'client_id'     =>  $this->client->id,
    //         'client_secret' =>  'fail-client-credential',
    //         'username'      =>  $this->user->email,
    //         'password'      =>  'secret'
    //     ])->shouldReturnJson()->seeJson(['error' => 'invalid_client']);

    //     $this->assertResponseStatus(401);
    // }

    // public function test_authentificate_client_id_fail(){

    //     $this->json('POST','/auth/login',[
    //         'client_id'     =>  'invalid-client',
    //         'client_secret' =>  $this->client->secret,
    //         'username'      =>  $this->user->email,
    //         'password'      =>  'secret'
    //     ])->shouldReturnJson()->seeJson(['status_code' => '422']);

    //     $this->assertResponseStatus(422);

    // }

    // public function test_issueToken_scope_valid(){

    //     $this->client->scopes = 'management';
    //     $this->client->save();

    //     $this->post('/oauth/token',[
    //         'grant_type' => 'password',
    //         'client_id'     =>  $this->client->id,
    //         'client_secret' =>  $this->client->secret,
    //         'username'      =>  $this->user->email,
    //         'password'      =>  'secret',
    //         'scope'         =>  'management'
    //     ])->shouldReturnJson()->seeJson(['token_type' => 'Bearer']);

    //     $this->assertResponseOk();
    // }

    // public function test_issueToken_scope_invalid(){

    //     $this->post('/oauth/token',[
    //         'grant_type' => 'password',
    //         'client_id'     =>  $this->client->id,
    //         'client_secret' =>  $this->client->secret,
    //         'username'      =>  $this->user->email,
    //         'password'      =>  'secret',
    //         'scope'         =>  'management'
    //     ])->shouldReturnJson()->seeJson(['error' => 'invalid_scope']);

    //     $this->assertResponseStatus(400);

    // }

    // public function test_register_valid() {

    //     $person = factory(App\Models\Person::class)->make();

    //     factory(App\Models\Types\ProfileType::class)->create();

    //     $this->json('POST','/auth/register',[

    //         'first_name' => $person->first_name,
    //         'last_name'  => $person->last_name,
    //         'email'      => $person->contact_email,
    //         'password'   => 'secret',
    //         'gender'     => $person->gender,

    //     ])->shouldReturnJson()->seeJson(['message' => 'register user account']);

    //     $this->seeInDatabase('users', [
    //         'email'    => $person->contact_email,
    //         'password' => md5('secret')
    //     ]);

    //     $this->seeInDatabase('persons', [
    //         'contact_email' => $person->contact_email,
    //         'first_name' => $person->first_name,
    //         'last_name'  => $person->last_name
    //     ]);

    //     $this->assertResponseStatus(201);
    // }

    // public function test_resend_email_valid(){

    //     $token = $this->createToken();

    //     $this->seeInDatabase('users', [
    //         'email'    => 'auth_user@aulasamigas.com',
    //         'code'     => 'authcode-verification'
    //     ]);

    //     $this->json('GET','/auth/register/resend_validate', [] , [
    //         'authorization' => 'Bearer ' .$token
    //     ])->shouldReturnJson()->seeJson(['message' => 'email send']);

    //     $this->missingFromDatabase('users', [
    //         'email'    => 'auth_user@aulasamigas.com',
    //         'code'     => 'authcode-verification'
    //     ]);

    //     $this->assertResponseOk();
    // }

    // public function test_email_verification_valid(){

    //     $user = factory(App\Models\Person::class)->create()->user()->save(factory(App\Models\User::class)->make([
    //         'code'  => 'code-validate',
    //         'email' => 'code@aulasamigas.com'
    //     ]));

    //     $this->seeInDatabase('users', [
    //         'email'    => 'code@aulasamigas.com',
    //         'code'     => 'code-validate',
    //         'email_verification' => false
    //     ]);

    //     $this->json('POST','/auth/register/validate', [
    //         'code' => 'code-validate'
    //     ])->shouldReturnJson()->seeJson([ 'message' => 'email verified']);

    //     $this->seeInDatabase('users', [
    //         'email'    => 'code@aulasamigas.com',
    //         'code'     =>  null,
    //         'email_verification' => true
    //     ]);

    //     $this->assertResponseOk();

    // }

}
