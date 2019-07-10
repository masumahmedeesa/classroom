<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('registration_no',10)->primary();
            $table->string('student_name',200);
            $table->string('contact_number',20)->unique();
            $table->string('photo',50)->nullable();
            $table->string('department',3);
            $table->string('batch_id',4);
            $table->string('blood_group',3)->nullable();
            $table->date('date_of_birth')->nullable();

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('students');
    }
}
