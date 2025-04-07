<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TradableAsset extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'symbol',
        'name',
        'type',
        'exchange',
        'currency',
        'current_price',
        'previous_close',
        'day_high',
        'day_low',
        'volume',
        'market_cap',
        'price_change_24h',
        'price_change_percentage_24h',
        'metadata',
        'tick_size',
        'lot_size',
        'min_trade_size',
        'max_trade_size',
        'is_active',
        'is_tradable',
        'last_price_update',
        'last_metadata_update',
    ];

    protected $casts = [
        'metadata' => 'array',
        'current_price' => 'decimal:8',
        'previous_close' => 'decimal:8',
        'day_high' => 'decimal:8',
        'day_low' => 'decimal:8',
        'volume' => 'decimal:2',
        'market_cap' => 'decimal:2',
        'price_change_24h' => 'decimal:2',
        'price_change_percentage_24h' => 'decimal:2',
        'tick_size' => 'decimal:8',
        'lot_size' => 'decimal:2',
        'min_trade_size' => 'decimal:2',
        'max_trade_size' => 'decimal:2',
        'is_active' => 'boolean',
        'is_tradable' => 'boolean',
        'last_price_update' => 'datetime',
        'last_metadata_update' => 'datetime',
    ];

    // Asset type constants
    const TYPE_STOCK = 'stock';
    const TYPE_BOND = 'bond';
    const TYPE_ETF = 'etf';
    const TYPE_MUTUAL_FUND = 'mutual_fund';
    const TYPE_OPTION = 'option';
    const TYPE_FUTURE = 'future';
    const TYPE_FOREX = 'forex';
    const TYPE_COMMODITY = 'commodity';
    const TYPE_REIT = 'reit';
    const TYPE_CRYPTOCURRENCY = 'cryptocurrency';

    // Relationships
    public function trades()
    {
        return $this->hasMany(Trade::class, 'asset_id');
    }

    public function openTrades()
    {
        return $this->trades()->where('status', 'open');
    }

    public function closedTrades()
    {
        return $this->trades()->where('status', 'closed');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeTradable($query)
    {
        return $query->where('is_tradable', true);
    }

    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    // Methods
    public function updatePrice($price, $timestamp = null)
    {
        $this->current_price = $price;
        $this->last_price_update = $timestamp ?? now();
        
        if ($this->previous_close === null) {
            $this->previous_close = $price;
        }
        
        $this->save();
    }

    public function updateMetadata($metadata)
    {
        $this->metadata = $metadata;
        $this->last_metadata_update = now();
        $this->save();
    }

    public function getPriceChange()
    {
        if ($this->previous_close === null) {
            return 0;
        }
        
        return $this->current_price - $this->previous_close;
    }

    public function getPriceChangePercentage()
    {
        if ($this->previous_close === null || $this->previous_close == 0) {
            return 0;
        }
        
        return (($this->current_price - $this->previous_close) / $this->previous_close) * 100;
    }

    public function isPriceValid()
    {
        return $this->last_price_update && $this->last_price_update->diffInMinutes(now()) < 5;
    }

    public function getFormattedPrice()
    {
        return number_format($this->current_price, $this->getPriceDecimals());
    }

    public function getPriceDecimals()
    {
        // Default to 2 decimals for most assets
        $decimals = 2;
        
        // Adjust decimals based on asset type
        switch ($this->type) {
            case self::TYPE_CRYPTOCURRENCY:
                $decimals = 8;
                break;
            case self::TYPE_FOREX:
                $decimals = 5;
                break;
            case self::TYPE_COMMODITY:
                $decimals = 3;
                break;
        }
        
        return $decimals;
    }

    public function getMetadataValue($key, $default = null)
    {
        return data_get($this->metadata, $key, $default);
    }
} 