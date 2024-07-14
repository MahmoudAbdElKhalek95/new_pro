<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_requests', function (Blueprint $table) {
            $table->id();
            $table->string('qualification');
            $table->tinyInteger('previous_experince')->default(1);
            $table->integer('age');
            $table->boolean('good_comunication')->default(false); // القدرة على الحوار والمرونة العقلية.
            $table->boolean('stapility_fitness')->default(false); // الاستقرار واللياقة النفسية
            $table->boolean('educational_perceptions')->default(false); // يمتلك التصورات التربوية الجيدة
            $table->boolean('environment_trainees')->default(false); // التفاعل مع البيئة والمتدربين
            $table->boolean('positivity')->default(false); // روح الإيجابية والإبداع
            $table->boolean('compunication')->default(false); // التواصل الجيد مع الآخرين
            $table->boolean('class_managment')->default(false); // لديه مهارة في إدارة الصف
            $table->boolean('self_confidence')->default(false); // الثقة بالنفس
            $table->boolean('attendance')->default(false); // حضور مالا يقل عن ٨٠% من الدورة التدريبية
            $table->decimal('price')->default(830);
            $table->foreignId('trainer_id')->references('id')->on('trainers');
            $table->softDeletes();
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
        Schema::dropIfExists('training_requests');
    }
}
