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
        Schema::create('experience_blogs', function (Blueprint $table) {
            $table->id();
            // Client
            $table->string('client');
            $table->string('category');
            $table->string('project_url');
            $table->string('location');
            $table->string('date');

            // Blog
            $table->string('title');
            $table->string('image');
            $table->text('short_description');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_blogs');
    }
};
