<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->string('Name');
            $table->string('image_path');
            $table->text('description');
            $table->text('large_desc')->nullable();
            $table->string('month')->nullable();
            $table->string('Links')->nullable();
            $table->decimal('class_fee');
            $table->decimal('admission_fee')->nullable();
            $table->decimal('offer_price')->nullable();
            $table->string('record_link')->nullable();
            $table->string('record_link_month')->nullable();
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
