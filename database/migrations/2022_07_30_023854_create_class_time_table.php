<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_time', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->time('opening_hour')->comment("giờ bắt đầu học");
            $table->time('closing_time')->comment("giờ kết thúc");
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
        Schema::dropIfExists('class_time');
    }
};