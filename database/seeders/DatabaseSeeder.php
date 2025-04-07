<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TradableAsset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@phoenixetf.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
        ]);

        // Create broker user
        User::create([
            'name' => 'Broker User',
            'email' => 'broker@phoenixetf.com',
            'email_verified_at' => now(),
            'password' => Hash::make('broker123'),
            'remember_token' => Str::random(10),
            'role' => 'broker',
        ]);

        // Create regular user
        User::create([
            'name' => 'Regular User',
            'email' => 'user@phoenixetf.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user123'),
            'remember_token' => Str::random(10),
            'role' => 'user',
        ]);

        // Create sample tradable assets
        $stocks = [
            ['symbol' => 'AAPL', 'name' => 'Apple Inc.', 'type' => 'stock', 'icon_url' => 'https://logo.clearbit.com/apple.com'],
            ['symbol' => 'MSFT', 'name' => 'Microsoft Corporation', 'type' => 'stock', 'icon_url' => 'https://logo.clearbit.com/microsoft.com'],
            ['symbol' => 'GOOGL', 'name' => 'Alphabet Inc.', 'type' => 'stock', 'icon_url' => 'https://logo.clearbit.com/google.com'],
            ['symbol' => 'AMZN', 'name' => 'Amazon.com Inc.', 'type' => 'stock', 'icon_url' => 'https://logo.clearbit.com/amazon.com'],
            ['symbol' => 'TSLA', 'name' => 'Tesla Inc.', 'type' => 'stock', 'icon_url' => 'https://logo.clearbit.com/tesla.com'],
        ];

        $cryptos = [
            ['symbol' => 'BTC', 'name' => 'Bitcoin', 'type' => 'cryptocurrency', 'icon_url' => 'https://cryptologos.cc/logos/bitcoin-btc-logo.png'],
            ['symbol' => 'ETH', 'name' => 'Ethereum', 'type' => 'cryptocurrency', 'icon_url' => 'https://cryptologos.cc/logos/ethereum-eth-logo.png'],
            ['symbol' => 'BNB', 'name' => 'Binance Coin', 'type' => 'cryptocurrency', 'icon_url' => 'https://cryptologos.cc/logos/bnb-bnb-logo.png'],
            ['symbol' => 'XRP', 'name' => 'Ripple', 'type' => 'cryptocurrency', 'icon_url' => 'https://cryptologos.cc/logos/xrp-xrp-logo.png'],
            ['symbol' => 'ADA', 'name' => 'Cardano', 'type' => 'cryptocurrency', 'icon_url' => 'https://cryptologos.cc/logos/cardano-ada-logo.png'],
        ];

        foreach ($stocks as $stock) {
            TradableAsset::create($stock);
        }

        foreach ($cryptos as $crypto) {
            TradableAsset::create($crypto);
        }
    }
} 