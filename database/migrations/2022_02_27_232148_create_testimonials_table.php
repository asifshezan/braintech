<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('test_id');
            $table->string('test_name',50)->nullable();
            $table->string('test_designation',100)->nullable();
            $table->string('test_company',80)->nullable();
            $table->integer('test_order')->nullable();
            $table->text('test_feedback',300)->nullable();
            $table->string('test_image',50)->nullable();
            $table->integer('test_feature')->default(1);
            $table->integer('test_creator')->nullable();
            $table->integer('test_editor')->nullable();
            $table->string('test_slug',50)->nullable();
            $table->integer('test_status')->default(1);
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
        Schema::dropIfExists('testimonials');
    }
}
