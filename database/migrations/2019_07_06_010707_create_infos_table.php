<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {

            $table->string('designation',100);
            $table->string('registration_no',10)->primary();
            $table->string('myself',1000);
            $table->string('contact_number',20)->unique();
            $table->string('photo')->nullable();
            $table->string('department',100)->nullable();
            $table->string('batch_id',8);
            $table->string('blood_group',5)->nullable();
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
        Schema::dropIfExists('infos');
    }
}
