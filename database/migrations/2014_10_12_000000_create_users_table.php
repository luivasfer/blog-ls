<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('apellido', 30);
            $table->string('email')->unique();
            $table->string('password', 80);
            $table->string('foto', 80)->nullable();
            $table->string('telefono', 10)->nullable();
            $table->integer('ci')->nullable();
            $table->enum('sexo', ['m', 'f']);
            $table->enum('estado', [0, 1])->default(1);
            $table->enum('nivel', ['admin','profesor','alumno'])->default('alumno');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
