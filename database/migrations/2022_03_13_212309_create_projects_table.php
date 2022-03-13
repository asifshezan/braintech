<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('pro_id');
            $table->integer('procate_id');
            $table->string('pro_title',150)->nullable();
            $table->string('pro_url',100)->nullable();
            $table->integer('pro_order')->nullable();
            $table->text('pro_remarks')->nullable();
            $table->string('pro_image')->nullable();
            $table->integer('pro_publish')->default(1);
            $table->integer('pro_creator')->nullable();
            $table->integer('pro_editor')->nullable();
            $table->string('pro_slug',50)->nullable();
            $table->string('pro_status')->default(1);
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
        Schema::dropIfExists('projects');
    }
}
