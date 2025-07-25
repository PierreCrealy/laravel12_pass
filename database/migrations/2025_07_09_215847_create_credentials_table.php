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
        Schema::create('credentials', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->longText('note')->nullable();

            $table->string('login');
            $table->string('password');

            $table->string('link')->nullable();
            $table->string('image')->nullable();

            $table->foreignId('repertory_id')->nullable()->references('id')->on('repertories')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credentials');
    }
};
