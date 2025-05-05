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
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->string('case_id')->unique();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('information')->nullable();
            $table->longText('assessment')->nullable();
            $table->longText('issues')->nullable();
            $table->longText('solution')->nullable();
            $table->longText('description')->nullable();
            $table->string('images')->nullable();
            $table->enum('visibility', ['public', 'private'])->default('public');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_studies');
    }
};
