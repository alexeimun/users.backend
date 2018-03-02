<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreatePersonsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('persons', function (Blueprint $table)
            {
                $table->increments('id');

                $table->unsignedInteger('school_grade_id')->index()->nullable();
                $table->unsignedInteger('document_type_id')->index()->nullable();
                $table->unsignedInteger('country_id')->nulleable();

                $table->string('first_name', 60)->nullable();
                $table->string('last_name', 60)->nullable();

                $table->enum('gender', ['male', 'female'])->nullable();
                $table->date('date_of_birth')->nullable();

                $table->string('phone', 45)->nullable();
                $table->string('cell_phone', 45)->nullable();
                $table->string('contact_email')->nullable();
                $table->string('document', 45)->nullable();

                $table->datetime('diagnosis_sent')->nullable();
                $table->boolean('pre_register')->nullable();
                $table->boolean('admin_profile')->nullable();
                $table->boolean('is_teacher')->nullable();

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
            Schema::dropIfExists('persons');
        }
    }
