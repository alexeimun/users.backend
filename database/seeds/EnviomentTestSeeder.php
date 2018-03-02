<?php

use Illuminate\Database\Seeder;

class EnviomentTestSeeder extends Seeder  
{
    public function run(){

    	factory(App\Models\Auth\Client::class)->create([
    		'id' => '0264e149-c0df-4739-987f-61a58c1d6126',
            'name' => 'Test Client',
            'secret' => 'fQ6U07ffsxyJRNAs41OAqfxBbBI5SrDyu6yizDWy',
            'password_client' => true,
            'personal_access_client' => true
        ]);

        $test = factory(App\Models\Person::class)->create();
        $test->user()->save(factory(App\Models\User::class)->make([
            'email' => 'test@aulasamigas.com',
        ]));     

        $courses = factory(App\Models\Person::class)->create();
        $courses->user()->save(factory(App\Models\User::class)->make([
            'email' => 'courses@aulasamigas.com'
        ])); 

        $comunica = factory(App\Models\Person::class)->create();
        $comunica->user()->save(factory(App\Models\User::class)->make([
            'email' => 'comunica@aulasamigas.com'
        ]));

        factory(App\Models\Types\ProfileType::class)->create([
            'name' => 'Maestro'
        ]);

        factory(App\Models\Types\ProfileType::class)->create([
            'name' => 'Estudiante',
        ]);

        factory(App\Models\Types\ProfileType::class)->create([
            'name' => 'Acudiente',
        ]);

    }
}