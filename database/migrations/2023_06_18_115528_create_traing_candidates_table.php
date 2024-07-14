<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraingCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traing_candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_id');
           // $table->foreign('training_id')->references('id')->on('trainings');
            $table->string("candidate")->nullable( ) ;
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
        Schema::dropIfExists('traing_candidates');
    }
}
