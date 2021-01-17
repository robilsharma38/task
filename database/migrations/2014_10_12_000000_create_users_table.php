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
            $table->id();
            $table->string('full_name',50);
            $table->string('email',100)->unique();
            $table->string('mobile',50);
            $table->integer('country');
            $table->integer('state');
            $table->integer('district');
            $table->string('profile_image',100);
            $table->string('password');
            $table->tinyInteger('role')->comment('3 for admin');
            $table->string('loginIp',50);
            $table->tinyInteger('status')->default('1');
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
