<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->increments('id');
            //Config App
            $table->string('app_name');
            $table->string('app_name_abv');
            $table->string('app_slogan')->nullable();
            //Config Captcha
            $table->string('captcha');
            $table->string('datasitekey')->nullable();
            $table->string('recaptcha_secret')->nullable();
            //Config Login
            $table->string('img_login');
            $table->string('caminho_img_login')->nullable();
            $table->integer('tamanho_img_login')->nullable();
            $table->string('titulo_login');
            //Config Layout
            $table->string('layout');
            $table->string('skin');
            $table->string('favicon')->nullable();
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
        Schema::dropIfExists('configs');
    }
}
