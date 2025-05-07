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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();                                // Stock Keeping Unit
            $table->string('category');                                     // Product Category
            $table->string('title');                                        // Product Name
            $table->string('description');                                  // Product Description
            $table->decimal('weight', 8, 2);                                // Product Weight
            $table->integer('quantity');                                    // Product Quantity
            $table->integer('stock');                                       // Product Stock
            $table->decimal('cost_price', 8, 2);                            // Product Cost Price
            $table->decimal('saleing_price', 8, 2);                         // Product Saleing Price
            $table->decimal('tax', 8, 2);                                   // Product Tax
            $table->enum('descount_type', ['flat', 'percentage']);          // Product Descount
            $table->decimal('descount', 8, 2);                              // Product Descount
            $table->decimal('profit', 8, 2);                                // Product Profit
            $table->string('images');                                       // Product Image
            $table->enum('visibility', ['public', 'private'])->default('public');   // Product Visibility
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('tags');                                          // Product Tags
            $table->timestamps();              // Timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
