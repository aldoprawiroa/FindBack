<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('found_items', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('security_post_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('description');
            $table->string('found_location');
            $table->dateTime('found_at');
            $table->string('photo_path')->nullable();
            $table->enum('lifecycle', ['draft', 'published', 'returned', 'archived'])->default('published');
            $table->dateTime('published_at')->nullable();
            $table->foreignId('published_by')->nullable()->constrained('users')->nullOnDelete();
            $table->unsignedInteger('operation_version')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('found_items');
    }
};