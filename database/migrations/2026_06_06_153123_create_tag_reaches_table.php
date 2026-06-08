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
        Schema::create('tag_reaches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->unique()->constrained('tags')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('status', 20)->default('active');
            $table->integer('total_views')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_reaches');
    }
};
