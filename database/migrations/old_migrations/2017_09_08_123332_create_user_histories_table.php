<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_histories', function (Blueprint $table) {

            $table->increments('id');
            
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('event_history_type_id')->index();
            $table->string('record_id', 255)->nullable();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_history_type_id')->references('id')->on('event_history_types');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_histories');
    }
}
