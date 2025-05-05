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
            $table->string('Title')->nullable();
            $table->string('Tagline')->nullable();
            $table->string('Favicon')->nullable();
            $table->string('Logo')->nullable();
            $table->string('DarkLogo')->nullable();
            $table->string('Tags')->nullable();
            $table->string('Description')->nullable();
            $table->string('Author')->nullable();
            $table->string('AuthorEmail')->nullable();
            $table->string('AuthorNumber')->nullable();
            $table->string('Developer')->nullable();
            $table->string('DeveloperEmail')->nullable();
            $table->string('DeveloperNumber')->nullable();
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
