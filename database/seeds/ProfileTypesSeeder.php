<?php

use Illuminate\Database\Seeder;

class ProfileTypesSeeder extends Seeder  
{
    public function run(){
        
        factory(App\Models\Types\ProfileType::class)->create([
            'name' => 'Maestro'
        ]);

        factory(App\Models\Types\ProfileType::class)->create([
            'name' => 'Estudiante',
        ]);

        factory(App\Models\Types\ProfileType::class)->create([
            'name' => 'Acudiente',
        ]);

        factory(App\Models\Types\ProfileType::class)->create([
            'name' => 'Padrino',
        ]);

    }
}