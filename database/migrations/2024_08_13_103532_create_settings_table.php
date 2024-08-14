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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('competition_name');
            $table->text('description');
            $table->string('logo');
            $table->dateTime('registration_start');
            $table->dateTime('registration_end');
            $table->dateTime('submission_start');
            $table->dateTime('submission_end');
            $table->dateTime('qualification_start');
            $table->dateTime('qualification_end');
            $table->dateTime('qualification_announcement');
            $table->dateTime('final_start');
            $table->dateTime('final_end');
            $table->dateTime('final_announcement');
            $table->enum('submission_type', ['text', 'file']);
            $table->text('submission_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
