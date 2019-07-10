<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classSchedule', function (Blueprint $table) {
            $table->date('Date')->primary();
            $table->string('day',15);
            $table->time('startTime');
            $table->time('finishTime');
            $table->string('courseCode');
            $table->foreign('courseCode')->references('courseCode')->on('courses');
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
        Schema::dropIfExists('classSchedule');
    }
}
