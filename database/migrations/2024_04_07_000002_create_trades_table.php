<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('asset_id')->constrained('tradable_assets')->onDelete('cascade');
            $table->enum('type', ['buy', 'sell']);
            $table->enum('status', ['open', 'closed', 'cancelled']);
            $table->decimal('amount', 15, 8);
            $table->decimal('entry_price', 15, 8);
            $table->decimal('exit_price', 15, 8)->nullable();
            $table->decimal('leverage', 8, 2);
            $table->decimal('pnl', 15, 2)->default(0);
            $table->decimal('margin_used', 15, 2);
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trades');
    }
}; 