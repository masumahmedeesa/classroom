<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferedCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offeredCourses', function (Blueprint $table) {
            $table->string('courseCode');
            $table->foreign('courseCode')->references('courseCode')->on('courses');
            $table->string('registration_no',10);
            $table->foreign('registration_no')->references('registration_no')->on('students');
            $table->year('sessionYear');
            $table->enum('studentType',['Regular','Drop']);
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
        Schema::dropIfExists('offeredCourses');
    }
}
