<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDronpandrenameToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
           $table->dropColumn('support_company');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('age');
            $table->dropColumn('env_number');
            $table->dropColumn('env_company_ids');
            $table->dropColumn('trainer_number');
            $table->dropColumn('student_number');
            $table->dropColumn('course_number');
            $table->dropColumn('company_number');
            $table->renameColumn('number', 'description');
            $table->string('project_manager')->nullable()->change();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
        });
    }
}
