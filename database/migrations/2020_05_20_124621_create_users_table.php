<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('setor')->default('-');
            $table->string('empresa')->default('-');
            $table->string('centro_custo')->default('-');
            $table->string('email_google')->default('-');
            $table->string('senha_google')->default('-');
            $table->integer('chip_id')->unsigned()->nullable();
            $table->integer('phone_id')->unsigned()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('adm')->nullable()->default(0);
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
