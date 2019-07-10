<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigns', function (Blueprint $table) {
            $table->string('moderator_id',10);
            $table->foreign('moderator_id')->references('moderator_id')->on('moderators');

            $table->string('courseCode');
            $table->foreign('courseCode')->references('courseCode')->on('courses');

            $table->string('teacher_id',10);
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers');

            $table->year('sessionYear');


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
        Schema::dropIfExists('assigns');
    }
}
