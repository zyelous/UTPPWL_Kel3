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
    Schema::create('films', function (Blueprint $table) {
        $table->id(); // bigint auto increment
        $table->string('title');
        $table->integer('year');
        $table->float('rating');

        // Relasi ke genre (bigint)
        $table->foreignId('genre_id')->constrained()->onDelete('cascade');

        // Relasi ke user (bigint)
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
