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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
             $table->string('image')->nullable();
            $table->string('title');
              $table->string('slug')->unique(); // Assuming slug is a unique identifier for posts
            $table->longText('content');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Assuming posts belong to categories
            $table->foreignId('user_id')->constrained('categories')->onDelete('cascade'); // Assuming posts belong to user
            $table->timestamp('published_at')->nullable(); // Nullable published_at for draft posts
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
