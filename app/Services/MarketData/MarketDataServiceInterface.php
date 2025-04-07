<?php

namespace App\Services\MarketData;

use App\Models\TradableAsset;
use Carbon\Carbon;

interface MarketDataServiceInterface
{
    /**
     * Get real-time price for an asset
     */
    public function getPrice(string $symbol): ?float;

    /**
     * Get historical price data for an asset
     */
    public function getHistoricalData(
        string $symbol,
        Carbon $start,
        Carbon $end,
        string $interval = '1d'
    ): array;

    /**
     * Get asset metadata
     */
    public function getMetadata(string $symbol): array;

    /**
     * Get candlestick data for an asset
     */
    public function getCandlestickData(
        string $symbol,
        Carbon $start,
        Carbon $end,
        string $interval = '1d'
    ): array;

    /**
     * Get order book data for an asset
     */
    public function getOrderBook(string $symbol, int $depth = 10): array;

    /**
     * Get recent trades for an asset
     */
    public function getRecentTrades(string $symbol, int $limit = 100): array;

    /**
     * Get available symbols for a specific asset type
     */
    public function getAvailableSymbols(string $type = null): array;

    /**
     * Check if the service supports a specific asset type
     */
    public function supportsAssetType(string $type): bool;
} 