<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->longText('long_description')->nullable();
            $table->decimal('price', 15, 2)->default(0);
            $table->decimal('sale_price', 15, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->json('gallery')->nullable();
            $table->string('unit')->default('pcs'); // satuan: pcs, kg, liter, dll
            $table->string('sku')->nullable()->unique();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
