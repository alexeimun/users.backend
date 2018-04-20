<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_informations', function (Blueprint $table) {
            
            $table->increments('id');
            
            $table->unsignedInteger('person_id')->index();
            $table->unsignedInteger('entity_id')->index()->nullable();

            $table->string('title', 45);
            $table->string('salary', 45);

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
        Schema::dropIfExists('job_informations');
    }
}
