<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifcationReadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifcation_reads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notifcation_id');
            $table->foreign('notifcation_id')->references('id')->on('notifcations')
                        ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');
                        $table->foreign('user_id')->references('id')->on('users') ;

            $table->tinyInteger('read')->default(0) ;

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
        Schema::dropIfExists('notifcation_reads');
    }
}
