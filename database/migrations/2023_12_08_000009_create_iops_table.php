<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIopsTable extends Migration
{
    public function up()
    {
        Schema::create('iops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isp')->nullable();
            $table->string('port')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
