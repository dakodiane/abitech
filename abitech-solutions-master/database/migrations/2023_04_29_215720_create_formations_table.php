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
        Schema::create('formations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->string('name');
            $table->longText('description');
            $table->integer('price')->default(0);
            $table->integer('visited')->default(0);
            $table->boolean('active')->default(true);
            $table->json('additional_information')->nullable();
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->text('document')->nullable();
            $table->foreignUuid('category_id')->nullable()->constrained('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
