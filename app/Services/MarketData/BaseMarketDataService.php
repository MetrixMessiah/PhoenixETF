<?php

namespace App\Services\MarketData;

use App\Models\TradableAsset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

abstract class BaseMarketDataService implements MarketDataServiceInterface
{
    protected array $supportedTypes = [];
    protected string $cachePrefix = 'market_data:';
    protected int $cacheTtl = 300; // 5 minutes

    public function supportsAssetType(string $type): bool
    {
        return in_array($type, $this->supportedTypes);
    }

    protected function getCacheKey(string $symbol, string $type): string
    {
        return $this->cachePrefix . $type . ':' . $symbol;
    }

    protected function cacheData(string $key, $data, ?int $ttl = null): void
    {
        Cache::put($key, $data, $ttl ?? $this->cacheTtl);
    }

    protected function getCachedData(string $key)
    {
        return Cache::get($key);
    }

    protected function logError(string $message, array $context = []): void
    {
        Log::error('Market Data Service Error: ' . $message, $context);
    }

    protected function formatCandlestickData(array $rawData): array
    {
        return array_map(function ($candle) {
            return [
                'timestamp' => $candle['timestamp'],
                'open' => (float) $candle['open'],
                'high' => (float) $candle['high'],
                'low' => (float) $candle['low'],
                'close' => (float) $candle['close'],
                'volume' => (float) $candle['volume'],
            ];
        }, $rawData);
    }

    protected function validateSymbol(string $symbol): bool
    {
        return TradableAsset::where('symbol', $symbol)->exists();
    }

    protected function getAssetType(string $symbol): ?string
    {
        $asset = TradableAsset::where('symbol', $symbol)->first();
        return $asset ? $asset->type : null;
    }

    protected function updateAssetPrice(TradableAsset $asset, float $price, array $metadata = []): void
    {
        try {
            $asset->updatePrice($price);
            
            if (!empty($metadata)) {
                $asset->updateMetadata($metadata);
            }
        } catch (\Exception $e) {
            $this->logError('Failed to update asset price', [
                'symbol' => $asset->symbol,
                'price' => $price,
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function validateTimeRange(Carbon $start, Carbon $end): bool
    {
        if ($start->isAfter($end)) {
            return false;
        }

        // Limit historical data to 1 year
        if ($start->diffInDays($end) > 365) {
            return false;
        }

        return true;
    }

    protected function validateInterval(string $interval): bool
    {
        $validIntervals = ['1m', '5m', '15m', '30m', '1h', '4h', '1d', '1w', '1M'];
        return in_array($interval, $validIntervals);
    }

    protected function formatOrderBookData(array $rawData): array
    {
        return [
            'bids' => array_map(function ($bid) {
                return [
                    'price' => (float) $bid['price'],
                    'quantity' => (float) $bid['quantity']
                ];
            }, $rawData['bids'] ?? []),
            'asks' => array_map(function ($ask) {
                return [
                    'price' => (float) $ask['price'],
                    'quantity' => (float) $ask['quantity']
                ];
            }, $rawData['asks'] ?? [])
        ];
    }

    protected function formatTradeData(array $rawData): array
    {
        return array_map(function ($trade) {
            return [
                'id' => $trade['id'],
                'price' => (float) $trade['price'],
                'quantity' => (float) $trade['quantity'],
                'side' => $trade['side'],
                'timestamp' => $trade['timestamp']
            ];
        }, $rawData);
    }
} 