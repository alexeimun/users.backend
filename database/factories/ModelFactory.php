<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Illuminate\Support\Facades\Hash;


$factory->define(App\Models\Auth\Client::class,function (Faker\Generator $faker) {
    return [
        'name' => $faker->name()
    ];
});


$factory->define(App\Models\Types\AdressType::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name()
    ];
});


$factory->define(App\Models\Types\ProfileType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name()
    ];
});


$factory->define(App\Models\Types\ReferenceType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name()
    ];
});


$factory->define(App\Models\Person::class, function (Faker\Generator $faker) {
    
    return [

        'school_grade_id'  => $faker->numberBetween(1,12),
        'document_type_id' => $faker->numberBetween(1,3),
        'first_name' 	   => $faker->firstName,
        'last_name' 	   => $faker->lastName,
        'gender' 	   	   => $faker->randomElement(['male' ,'female']),
        'date_of_birth'    => $faker->date(),
        'phone' 	       => $faker->phoneNumber,
        'cell_phone' 	   => $faker->phoneNumber,
        'document' 	       => $faker->randomNumber(),
        'diagnosis_sent'   => $faker->datetime(),
        'contact_email'    => $faker->email

    ];
});


$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    

    return [

        'email'	 	=> $faker->unique()->safeEmail,
        'password' 	=> Hash::make('secret'),
        'image' 	=> 'https://storage.googleapis.com/aulasamigas/resources/profile/default.jpg',
        'active' 	=> $faker->randomElement([true,false]),
        'email_verification' => false
    ];
});


$factory->define(App\Models\Adress::class, function (Faker\Generator $faker) {
    
    return [

        'adress_type_id' => 1,
        'city_id'        => $faker->numberBetween(1,255),
        'location'       => $faker->streetAddress,
        'neighborhood'   => $faker->streetName,
    ];
});


$factory->define(App\Models\JobInformation::class, function (Faker\Generator $faker) {
    
    return [

        'entity_id'      => $faker->numberBetween(1,3),
        'title'         => $faker->jobTitle,
        'salary'        => $faker->randomNumber(8),
    ];
});