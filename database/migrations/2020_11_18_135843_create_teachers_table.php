<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('tid')->nullable();
            $table->string('faculty')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('password')->nullable();
            $table->string('photo')->nullable();
            $table->string('status')->nullable();
            $table->string('vkey')->nullable();
            $table->string('verify')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
