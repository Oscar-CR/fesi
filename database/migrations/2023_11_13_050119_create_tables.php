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

        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start');
            $table->date('end');
            $table->timestamps();
        });


        Schema::create('ambits', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->unsignedBigInteger('period_id');
            $table->foreign('period_id')->references('id')->on('periods');
            $table->timestamps();
        });

        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date_test')->nullable();
            $table->string('school_shift')->nullable();
            $table->string('classroom')->nullable();   
            $table->dateTime('start')->nullable();   
            $table->dateTime('end')->nullable(); 
            $table->string('introduction')->nullable(); 
            $table->longText('general_criteria')->nullable();
            $table->longText('documents')->nullable(); 
            $table->longText('works')->nullable();
            $table->longText('work_criteria')->nullable();  
            $table->longText('work_requeriment')->nullable();  
            $table->longText('evaluation_criteria')->nullable(); 
            $table->longText('theme_references')->nullable(); 
            $table->longText('suggestion')->nullable(); 
            $table->longText('other')->nullable(); 
            $table->timestamps();
        });

        Schema::create('sinodals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->timestamps();
        });

        Schema::create('user_has_ambit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ambit_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('ambit_id')->references('id')->on('ambits');
            $table->timestamps();
        });

        Schema::create('ambit_has_theme', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('ambit_id');
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->foreign('ambit_id')->references('id')->on('ambits');
            $table->timestamps();
        });

        Schema::create('theme_has_course', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('theme_id');
            $table->unsignedBigInteger('course_id');
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->timestamps();
        });

        Schema::create('course_has_sinodal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sinodal_id');
            $table->unsignedBigInteger('course_id');
            $table->foreign('sinodal_id')->references('id')->on('sinodals');
            $table->foreign('course_id')->references('id')->on('courses');
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
        Schema::dropIfExists('course_has_sinodal');
        Schema::dropIfExists('theme_has_course');
        Schema::dropIfExists('ambit_has_theme');
        Schema::dropIfExists('user_has_ambit');
        Schema::dropIfExists('sinodals');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('themes');
        Schema::dropIfExists('ambits');
        Schema::dropIfExists('periods');
    }
};
