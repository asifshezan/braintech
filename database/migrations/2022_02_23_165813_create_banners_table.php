<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('ban_id');
            $table->string('ban_title',200)->nullable();
            $table->string('ban_subtitle',100)->nullable();
            $table->string('ban_button',30)->nullable();
            $table->string('ban_url',50)->nullable();
            $table->integer('ban_order')->nullable();
            $table->string('ban_image',100)->nullable();
            $table->integer('ban_publish')->default(1);
            $table->integer('ban_creator')->nullable();
            $table->integer('ban_editor')->nullable();
            $table->string('ban_slug',50)->nullable();
            $table->integer('ban_status')->default(1);
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
        Schema::dropIfExists('banners');
    }
}
