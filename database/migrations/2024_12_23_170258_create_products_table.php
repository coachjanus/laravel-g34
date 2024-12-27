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
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->foreignId('brand_id')->constrained()->onUpdate('cascade')->onDelete(('cascade'));
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete(('cascade'));
            $table->string('cover')->nullable();
            $table->timestamps();
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
