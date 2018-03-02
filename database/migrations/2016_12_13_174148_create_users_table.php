<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('person_id')->unique()->index();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('image')->default('https://storage.googleapis.com/aulasamigas/resources/profile/default.jpg')->nullable();
            $table->boolean('email_verification')->default(false);
            $table->boolean('active')->default(true);
            $table->string('code', 32)->nullable();
            $table->string('permissions_binary')->nullable();

            $table->timestamps();
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
        Schema::dropIfExists('users');
    }
}
