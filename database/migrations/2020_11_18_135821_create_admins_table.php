<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('aid')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('login_date')->nullable();
            $table->string('login_time')->nullable();
            $table->string('name')->nullable();
            $table->string('birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
