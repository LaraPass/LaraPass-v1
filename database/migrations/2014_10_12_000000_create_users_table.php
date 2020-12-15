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
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('mobile')->nullable();
            $table->string('dob',25)->nullable();
            $table->string('country',55)->nullable();
            $table->string('avatar',55)->default('default.jpg');
            $table->integer('two_step')->default(0);
            $table->text('google2fa_secret')->nullable();
            $table->string('status')->default('Active');
            $table->string('security_questions')->default(0);
            $table->integer('rng_level')->nullable();
            $table->text('support_pin')->nullable();
            $table->string('membership',25)->default('Free');
            $table->string('type')->default('default');
            $table->text('backup_codes')->nullable();
            $table->string('remark')->nullable();
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
