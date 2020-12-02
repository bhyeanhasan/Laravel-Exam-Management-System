<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('tid')->nulable();
            $table->string('faculty')->nulable();
            $table->string('session')->nulable();
            $table->string('semister')->nulable();
            $table->string('course')->nulable();
            $table->string('course_id')->nulable();
            $table->string('exam_date')->nulable();
            $table->string('exam_time')->nulable();
            $table->string('exam_type')->nulable();
            $table->string('exam_mark')->nulable();
            $table->string('exam_duration')->nulable();
            $table->string('accept')->nulable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('exams');
    }
}
