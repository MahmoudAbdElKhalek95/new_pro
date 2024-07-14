<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_managers', function (Blueprint $table) {
            $table->id();
       
            $table->string('name') ;
            $table->date('birth_date') ;
            $table->string('phone') ; /// 10 digits
            $table->string('email') ;
            $table->string('qualifacation')->nullable();
            $table->string('specialization')->nullable() ;
            $table->string('current_work')->nullable() ;
         //   $table->string('city_id') ;   // cities
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities') ;
            //$table->string('state_id') ;  // states
            $table->unsignedBigInteger('state_id');
            $table->foreign('state_id')->references('id')->on('states') ;
            $table->string('image')->nullable() ;
            $table->string('cert')->nullable() ;

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
        Schema::dropIfExists('project_managers');
    }
}
