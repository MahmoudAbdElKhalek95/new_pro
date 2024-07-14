<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullToOrderCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_courses', function (Blueprint $table) {
            $table->string('reciever_name')->nullable()->change() ;
            $table->string('reciever_phone')->nullable()->change() ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_courses', function (Blueprint $table) {
            //
        });
    }
}
