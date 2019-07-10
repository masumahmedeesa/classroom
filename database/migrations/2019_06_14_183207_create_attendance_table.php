<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {

            $table->bigIncrements('serial_no')->unsigned();

            $table->string('courseCode');
            $table->foreign('courseCode')->references('courseCode')->on('courses');

            $table->string('registration_no',10);
            $table->foreign('registration_no')->references('registration_no')->on('students');

            $table->date('attendanceDate');
            $table->enum('presence',['Y','N']);

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
        Schema::dropIfExists('attendance');
    }
}
