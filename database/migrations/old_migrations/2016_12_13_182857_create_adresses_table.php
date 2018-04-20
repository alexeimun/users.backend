<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adresses', function (Blueprint $table) {
            
            $table->increments('id');

            $table->unsignedInteger('adress_type_id')->index();
            $table->unsignedInteger('person_id')->index();
            $table->unsignedInteger('city_id')->index()->nullable();

            $table->string('location')->nullable();
            $table->string('neighborhood')->nullable();

            $table->foreign('adress_type_id')->references('id')->on('adress_types');
            $table->foreign('person_id')->references('id')->on('persons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adresses');
    }
}
