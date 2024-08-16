<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('assessment_id')->unsigned();
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->enum('value', [1,2,3,4,5]);
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->foreign('team_id')
            ->references('id')
            ->on('teams')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('assessment_id')
            ->references('id')
            ->on('assessments')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
