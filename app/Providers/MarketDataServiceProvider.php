<?php

namespace App\Providers;

use App\Services\MarketData\MarketDataServiceInterface;
use Illuminate\Support\ServiceProvider;

class MarketDataServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(MarketDataServiceInterface::class, function ($app) {
            // Return the appropriate service based on configuration
            $provider = config('services.market_data.provider', 'default');
            
            return match ($provider) {
                'alpha_vantage' => $app->make(\App\Services\MarketData\AlphaVantageService::class),
                'yahoo_finance' => $app->make(\App\Services\MarketData\YahooFinanceService::class),
                'binance' => $app->make(\App\Services\MarketData\BinanceService::class),
                default => $app->make(\App\Services\MarketData\DefaultMarketDataService::class),
            };
        });
    }

    public function boot()
    {
        //
    }
} 