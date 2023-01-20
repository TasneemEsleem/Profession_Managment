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
        Schema::create('proposels', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            // $table->float('price');
            $table->boolean('status')->default(true);
            
            $table->foreignId('profession_id');
            $table->foreign('profession_id')->references('id')->on('professions');

            $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects');

            $table->boolean('accepted')->default(false);
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
        Schema::dropIfExists('proposels');
    }
};
