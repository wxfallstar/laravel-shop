<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("nickname", 90);
            $table->char("password", 64)->default("");
            $table->char("weixin_openid", 64)->nullable();
            $table->string("image_head", 255);
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
        Schema::dropIfExists('sys_user');
    }
}
