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
        Schema::create('profession_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_id');
            $table->foreign('skill_id')->references('id')->on('skills');
            
            $table->foreignId('profession_id');
            $table->foreign('profession_id')->references('id')->on('professions');

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
        Schema::dropIfExists('profession_skills');
    }
};
