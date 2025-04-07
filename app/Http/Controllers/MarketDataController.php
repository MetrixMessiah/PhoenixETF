<?php

namespace App\Http\Controllers;

use App\Models\TradableAsset;
use App\Services\MarketData\MarketDataServiceInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MarketDataController extends Controller
{
    protected MarketDataServiceInterface $marketDataService;

    public function __construct(MarketDataServiceInterface $marketDataService)
    {
        $this->marketDataService = $marketDataService;
    }

    public function getPrice(string $symbol): JsonResponse
    {
        $asset = TradableAsset::where('symbol', $symbol)->firstOrFail();
        
        if (!$this->marketDataService->supportsAssetType($asset->type)) {
            return response()->json([
                'error' => 'Unsupported asset type'
            ], 400);
        }

        $price = $this->marketDataService->getPrice($symbol);
        
        if ($price === null) {
            return response()->json([
                'error' => 'Failed to fetch price'
            ], 500);
        }

        return response()->json([
            'symbol' => $symbol,
            'price' => $price,
            'timestamp' => now()->timestamp
        ]);
    }

    public function getHistoricalData(Request $request, string $symbol): JsonResponse
    {
        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'interval' => 'required|in:1m,5m,15m,30m,1h,4h,1d,1w,1M'
        ]);

        $asset = TradableAsset::where('symbol', $symbol)->firstOrFail();
        
        if (!$this->marketDataService->supportsAssetType($asset->type)) {
            return response()->json([
                'error' => 'Unsupported asset type'
            ], 400);
        }

        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        $interval = $request->interval;

        $data = $this->marketDataService->getHistoricalData($symbol, $start, $end, $interval);
        
        return response()->json([
            'symbol' => $symbol,
            'data' => $data
        ]);
    }

    public function getCandlestickData(Request $request, string $symbol): JsonResponse
    {
        $request->validate([
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
            'interval' => 'required|in:1m,5m,15m,30m,1h,4h,1d,1w,1M'
        ]);

        $asset = TradableAsset::where('symbol', $symbol)->firstOrFail();
        
        if (!$this->marketDataService->supportsAssetType($asset->type)) {
            return response()->json([
                'error' => 'Unsupported asset type'
            ], 400);
        }

        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        $interval = $request->interval;

        $data = $this->marketDataService->getCandlestickData($symbol, $start, $end, $interval);
        
        return response()->json([
            'symbol' => $symbol,
            'data' => $data
        ]);
    }

    public function getOrderBook(Request $request, string $symbol): JsonResponse
    {
        $request->validate([
            'depth' => 'integer|min:1|max:100'
        ]);

        $asset = TradableAsset::where('symbol', $symbol)->firstOrFail();
        
        if (!$this->marketDataService->supportsAssetType($asset->type)) {
            return response()->json([
                'error' => 'Unsupported asset type'
            ], 400);
        }

        $depth = $request->input('depth', 10);
        $data = $this->marketDataService->getOrderBook($symbol, $depth);
        
        return response()->json([
            'symbol' => $symbol,
            'data' => $data
        ]);
    }

    public function getRecentTrades(Request $request, string $symbol): JsonResponse
    {
        $request->validate([
            'limit' => 'integer|min:1|max:1000'
        ]);

        $asset = TradableAsset::where('symbol', $symbol)->firstOrFail();
        
        if (!$this->marketDataService->supportsAssetType($asset->type)) {
            return response()->json([
                'error' => 'Unsupported asset type'
            ], 400);
        }

        $limit = $request->input('limit', 100);
        $data = $this->marketDataService->getRecentTrades($symbol, $limit);
        
        return response()->json([
            'symbol' => $symbol,
            'data' => $data
        ]);
    }

    public function getAvailableSymbols(Request $request): JsonResponse
    {
        $request->validate([
            'type' => 'nullable|string'
        ]);

        $type = $request->input('type');
        $symbols = $this->marketDataService->getAvailableSymbols($type);
        
        return response()->json([
            'symbols' => $symbols
        ]);
    }
} 