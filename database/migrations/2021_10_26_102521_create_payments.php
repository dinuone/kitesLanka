<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('st_id');
            $table->string('student_id');
            $table->unsignedBigInteger('course_id');
            $table->string('image_path')->nullable();
            $table->boolean('payment_status')->default(0);
            $table->string('month');
            $table->decimal('amount');
            $table->bigInteger('ref_number')->nullable();
            $table->string('pdf_file')->nullable();
            $table->timestamps();

            $table->foreign('st_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
