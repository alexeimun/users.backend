<?php

class TestCase extends Laravel\Lumen\Testing\TestCase {

    /**
     *
     * the person instance
     *
     * @var App\Models\Person
     */
    protected $person;

    /**
     *
     * the user instance
     *
     * @var App\Models\User
     */
    protected $user;

    /**
     *
     * the client instance
     *
     * @var App\Models\Auth\Client
     */
    protected $client;

    /**
     * Creates the application.
     *
     * @return \Laravel\Lumen\Application
     */
    public function createApplication() {
        return require __DIR__ . '/../bootstrap/app.php';
    }

    /**
     * Create token for path auth
     *
     * @return void
     */
    protected function createToken() {

        if(!$this->person) {
            $this->createPerson();
        }

        if(!$this->client) {
            $this->createClient();
        }

        $this->json('POST', '/auth/login', ['client_id' => $this->client->id, 'client_secret' => $this->client->secret, 'username' => $this->user->email, 'password' => 'secret'])->seejson(['token_type' => 'Bearer']);

        $this->refreshApplication();

        return json_decode($this->response->getContent())->access_token;

    }

    /**
     * Create user for test
     *
     * @return void
     */
    protected function createPerson() {

        $this->person = factory(App\Models\Person::class)->create();

        $this->user = $this->person->user()->save(factory(App\Models\User::class)->make(['email' => 'auth_user@aulasamigas.com', 'code' => 'authcode-verification']));

    }

    /**
     * Create user for client auth for test
     *
     * @return void
     */
    protected function createClient() {
        $this->client = factory(App\Models\Auth\Client::class)->create(['name' => 'Testing client', 'secret' => 'testing-secret', 'password_client' => true]);
    }

}