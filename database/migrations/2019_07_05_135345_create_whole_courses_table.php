<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWholeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wholeCourses', function (Blueprint $table) {
            $table->bigIncrements('cid');
            $table->string('sessionYear',10);
            $table->string('courseName',100)->nullable();
            $table->string('courseCode',10);
            $table->string('teacherName',100);
            $table->float('credit');
            $table->string('timeSpan',600);
//            $table->string('registration_no',10);
//            $table->foreign('registration_no')->references('registration_no')->on('wholeCourses');
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
        Schema::dropIfExists('wholeCourses');
    }
}
