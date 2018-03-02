<?php

use Illuminate\Database\Seeder;

class TypeTablesSeeder extends Seeder  
{
    
    public function run(){
    	$this->adressTypes();
   		$this->referenceTypes();
    }

    private function referenceTypes(){
    	
    	factory(App\Models\Types\ReferenceType::class)->create([
   			'name' => 'Personal'
   		]);


   		factory(App\Models\Types\ReferenceType::class)->create([
   			'name' => 'Comercial'
   		]);

    }

    private function adressTypes(){

    	factory(App\Models\Types\AdressType::class)->create([
   			'name' => 'Casa'
   		]);


   		factory(App\Models\Types\AdressType::class)->create([
   			'name' => 'Apartamento'
   		]);

    }

}