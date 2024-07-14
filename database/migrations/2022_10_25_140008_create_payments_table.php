<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
         
            $table->unsignedBigInteger('course_id') ;
            $table->foreign('course_id')->references('id')->on('courses');
            $table->string('price');
            $table->date('date');
            $table->string('payment_way'); // cash -check- transfer
            $table->string('file')->nullable();
            $table->string('status')->default('pending'); // pending -accepted - rejected 
            $table->text('note')->nullable();

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
        Schema::dropIfExists('payments');
    }
}
