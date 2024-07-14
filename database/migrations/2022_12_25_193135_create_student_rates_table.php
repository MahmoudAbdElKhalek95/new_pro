<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id') ;
            $table->foreign( 'student_id' ) ->references('id')->on('students') ;

            $table->unsignedBigInteger('trainer_id') ;
            $table->foreign( 'trainer_id' ) ->references('id')->on('trainers') ;

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
        Schema::dropIfExists('student_rates');
    }
}
