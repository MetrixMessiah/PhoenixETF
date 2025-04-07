<?php

use App\Http\Controllers\MarketDataController;
use Illuminate\Support\Facades\Route;

// Market Data Routes
Route::prefix('market-data')->group(function () {
    Route::get('price/{symbol}', [MarketDataController::class, 'getPrice']);
    Route::get('historical/{symbol}', [MarketDataController::class, 'getHistoricalData']);
    Route::get('candlestick/{symbol}', [MarketDataController::class, 'getCandlestickData']);
    Route::get('orderbook/{symbol}', [MarketDataController::class, 'getOrderBook']);
    Route::get('trades/{symbol}', [MarketDataController::class, 'getRecentTrades']);
    Route::get('symbols', [MarketDataController::class, 'getAvailableSymbols']);
}); 