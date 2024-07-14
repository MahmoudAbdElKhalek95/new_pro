<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewdataToOrderCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_courses', function (Blueprint $table) {

            $table->string('shipping_way')->nullable();
            //receive_from_company --- shipping
            //// استلام من المقر  ---  شحن الطلب

            $table->string('shipping_price')->nullable();
            $table->string('hour_number')->nullable();
            $table->string('subscriber_number')->nullable()->change();


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
