<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkForDeletionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mark_for_deletion_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('username');
            $table->string('action');
            $table->string('ip_address')->nullable()->default(null);
            $table->string('user_agent')->nullable()->default(null);
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
        Schema::dropIfExists('mark_for_deletion_logs');
    }
}
