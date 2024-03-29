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
        Schema::create('course_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('course_sub_list_id');
            $table->integer('no');
            $table->foreignId('course_id');
            $table->string('list_name');
            $table->integer('time');
            $table->string('link');
            $table->text('course_desc')->nullable();
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
        Schema::dropIfExists('course_lists');
    }
};
