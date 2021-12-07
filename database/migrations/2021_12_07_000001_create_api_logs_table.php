<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApiLogsTable extends Migration
{
    public function up()
    {
        Schema::create(config('api-log.table_name'), function (Blueprint $table) {
            $table->id();
            $table->string('group_name', 50)->default('');
            $table->string('ip', 50)->default('');
            $table->string('method', 10)->default('');
            $table->string('url')->default('');
            $table->text('header')->nullable();
            $table->longText('body')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists(config('api-log.table_name'));
    }
}
