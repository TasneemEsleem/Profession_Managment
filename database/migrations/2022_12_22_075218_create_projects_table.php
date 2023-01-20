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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('duration_date')->nullable();
            $table->float('price');
            $table->boolean('status')->default(true);

            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->foreignId('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories');
            
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
};
