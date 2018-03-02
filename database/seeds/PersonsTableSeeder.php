<?php

use Illuminate\Database\Seeder;

class PersonsTableSeeder extends Seeder  
{
    public function run(){

   		factory(App\Models\Person::class, 50)->create()->each(function ($person) {
             
            $person->user()->save(factory(App\Models\User::class)->make());
            $person->adress()->save(factory(App\Models\Adress::class)->make());
            $person->job()->save(factory(App\Models\JobInformation::class)->make());
            
        });

    }
}