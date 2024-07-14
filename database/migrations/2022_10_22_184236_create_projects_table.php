<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
          
            $table->string('name');
            $table->string('number');
            $table->string('support_company');
            $table->string('project_manager');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('age');
            $table->string('location');
            $table->string('env_number'); // environment
            $table->string('env_company_ids'); // arrray 

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
        Schema::dropIfExists('projects');
    }
}
