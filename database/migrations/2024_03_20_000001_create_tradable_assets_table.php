<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
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
                'cryptocurrency'
            ]);
            $table->string('exchange')->nullable();
            $table->string('currency', 3)->default('USD');
            $table->decimal('current_price', 20, 8);
            $table->decimal('previous_close', 20, 8)->nullable();
            $table->decimal('day_high', 20, 8)->nullable();
            $table->decimal('day_low', 20, 8)->nullable();
            $table->decimal('volume', 20, 2)->nullable();
            $table->decimal('market_cap', 20, 2)->nullable();
            $table->decimal('price_change_24h', 10, 2)->nullable();
            $table->decimal('price_change_percentage_24h', 10, 2)->nullable();
            
            // Asset-specific fields
            $table->json('metadata')->nullable(); // For storing type-specific data
            $table->decimal('tick_size', 10, 8)->nullable();
            $table->decimal('lot_size', 10, 2)->nullable();
            $table->decimal('min_trade_size', 10, 2)->nullable();
            $table->decimal('max_trade_size', 20, 2)->nullable();
            
            // Trading status
            $table->boolean('is_active')->default(true);
            $table->boolean('is_tradable')->default(true);
            $table->timestamp('last_price_update')->nullable();
            $table->timestamp('last_metadata_update')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tradable_assets');
    }
}; 