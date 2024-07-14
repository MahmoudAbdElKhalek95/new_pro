<?php

use Doctrine\DBAL\Schema\Table;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_courses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('course_id') ;
            $table->foreign('course_id')->references('id')->on('courses');
            $table->string('trainer_quantity') ;  // copy number
            $table->string('student_quantity') ;  // copy number
            $table->string('company_id') ; // auth comapnyid
            $table->date('date') ;
            $table->time('time') ;
            $table->string('subscriber_number') ;
            $table->string('trainer_id') ; // select
            $table->string('reciever_name') ;
            $table->string('reciever_phone') ;
            $table->string('status') ; // pending - revition - processing -confirmed - completed


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
        Schema::dropIfExists('order_courses');
    }
}
