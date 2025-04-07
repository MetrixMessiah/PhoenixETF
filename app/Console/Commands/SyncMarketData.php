<?php

namespace App\Console\Commands;

use App\Models\TradableAsset;
use App\Services\MarketData\MarketDataServiceInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SyncMarketData extends Command
{
    protected $signature = 'market:sync {--type=} {--force}';
    protected $description = 'Sync market data for tradable assets';

    protected MarketDataServiceInterface $marketDataService;

    public function __construct(MarketDataServiceInterface $marketDataService)
    {
        parent::__construct();
        $this->marketDataService = $marketDataService;
    }

    public function handle()
    {
        $type = $this->option('type');
        $force = $this->option('force');

        $query = TradableAsset::query();
        
        if ($type) {
            $query->where('type', $type);
        }

        $assets = $query->get();
        $bar = $this->output->createProgressBar(count($assets));
        
        $this->info('Starting market data sync...');
        $bar->start();

        foreach ($assets as $asset) {
            try {
                if (!$this->marketDataService->supportsAssetType($asset->type)) {
                    $this->warn("Skipping {$asset->symbol}: Unsupported asset type");
                    continue;
                }

                // Skip if price is recent and not forcing update
                if (!$force && $asset->isPriceValid()) {
                    continue;
                }

                $price = $this->marketDataService->getPrice($asset->symbol);
                if ($price === null) {
                    $this->warn("Failed to get price for {$asset->symbol}");
                    continue;
                }

                $metadata = $this->marketDataService->getMetadata($asset->symbol);
                $asset->updatePrice($price, $metadata);

                $this->info("Updated {$asset->symbol}: \${$price}");
            } catch (\Exception $e) {
                Log::error('Market data sync error', [
                    'symbol' => $asset->symbol,
                    'error' => $e->getMessage()
                ]);
                $this->error("Error updating {$asset->symbol}: {$e->getMessage()}");
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info('Market data sync completed!');
    }
} 