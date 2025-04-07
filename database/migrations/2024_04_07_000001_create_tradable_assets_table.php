<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tradable_assets', function (Blueprint $table) {
            $table->id();
            $table->string('symbol')->unique();
            $table->string('name');
            $table->enum('type', [
                'stock',
                'bond',
                'etf',
                'mutual_fund',
                'option',
                'future',
                'forex',
                'commodity',
                'reit',
                'crypto'
            ]);
            $table->string('exchange')->nullable();
            $table->decimal('current_price', 15, 8)->default(0);
            $table->decimal('min_trade_amount', 15, 8)->default(0);
            $table->decimal('max_leverage', 8, 2)->default(1);
            $table->boolean('is_active')->default(true);
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tradable_assets');
    }
}; 