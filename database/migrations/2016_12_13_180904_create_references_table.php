<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {

            $table->increments('id');
           
            $table->unsignedInteger('reference_type_id')->index();
            $table->unsignedInteger('person_id')->index();
            $table->unsignedInteger('reference_id')->index();

            $table->string('relationship');

            $table->foreign('reference_type_id')->references('id')->on('reference_types');
            $table->foreign('person_id')->references('id')->on('persons');
            $table->foreign('reference_id')->references('id')->on('persons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('references');
    }
}
