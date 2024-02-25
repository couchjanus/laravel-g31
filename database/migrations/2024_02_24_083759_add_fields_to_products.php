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
        Schema::table('products', function (Blueprint $table) {
            $table->string('name')->unique();
            $table->string('slug')->nullable();
            $table->unsignedInteger('status')->default(0);
            // $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreignId('brand_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->decimal('price', 8, 2);
            $table->text('description');
            $table->string('cover');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('brand_id');
            $table->dropForeign('category_id');
            $table->dropColumn(['name', 'slug', 'price', 'status', 'description', 'cover']);
            $table->dropSoftDeletes();
        });
    }
};
