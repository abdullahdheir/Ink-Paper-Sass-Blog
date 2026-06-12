<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('plan', ['free', 'pro', 'enterprise'])->default('free');
            $table->enum('status', ['active', 'cancelled', 'expired', 'pending'])->default('pending');
            $table->string('payment_method')->nullable(); // knet, stripe, etc.
            $table->string('payment_reference')->nullable();
            $table->decimal('amount', 8, 2)->default(0);
            $table->string('currency', 3)->default('USD');
            $table->boolean('auto_renew')->default(true);
            $table->timestamp('started_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
