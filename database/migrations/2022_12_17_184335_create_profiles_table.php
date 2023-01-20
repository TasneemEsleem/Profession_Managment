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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('experience_certificate')->nullable();
            $table->string('Prof_pract_certif')->nullable();
            $table->enum('gender', ['M', 'F'])->default('M');
            $table->date('birth_date');
            $table->text('overview')->nullable();
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->foreignId('subcategory_id');
            $table->foreign('subcategory_id')->references('id')->on('sub_categories');
            
            $table->foreignId('profession_id');
            $table->foreign('profession_id')->references('id')->on('professions');
            
            // $table->foreignId('skill_id')->nullable();
            // $table->foreign('skill_id')->references('id')->on('skills');
            
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('profiles');
    }
};
