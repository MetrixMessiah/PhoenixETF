<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'asset_id',
        'type',
        'status',
        'amount',
        'entry_price',
        'exit_price',
        'leverage',
        'pnl',
        'margin_used',
        'closed_at',
    ];

    protected $casts = [
        'amount' => 'decimal:8',
        'entry_price' => 'decimal:8',
        'exit_price' => 'decimal:8',
        'leverage' => 'decimal:2',
        'pnl' => 'decimal:2',
        'margin_used' => 'decimal:2',
        'closed_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function asset()
    {
        return $this->belongsTo(TradableAsset::class, 'asset_id');
    }

    public function updatePnL()
    {
        if ($this->status !== 'open') {
            return;
        }

        $currentPrice = $this->asset->current_price;
        $pnl = $this->calculatePnL($currentPrice);
        
        $this->update(['pnl' => $pnl]);

        // Check if we need to trigger a stopout
        if ($this->user->getMarginLevel() <= $this->user->stopout_level) {
            $this->close($currentPrice, 'stopout');
        }
    }

    public function close($exitPrice = null, $reason = 'manual')
    {
        if ($this->status !== 'open') {
            return;
        }

        $exitPrice = $exitPrice ?? $this->asset->current_price;
        $finalPnL = $this->calculatePnL($exitPrice);

        $this->update([
            'status' => 'closed',
            'exit_price' => $exitPrice,
            'pnl' => $finalPnL,
            'closed_at' => now(),
        ]);

        // Update user's balance and margin
        $this->user->update([
            'balance' => $this->user->balance + $finalPnL,
            'margin' => $this->user->margin - $this->margin_used,
        ]);
    }

    protected function calculatePnL($currentPrice)
    {
        $direction = $this->type === 'buy' ? 1 : -1;
        $priceChange = $currentPrice - $this->entry_price;
        return $direction * $priceChange * $this->amount * $this->leverage;
    }
} 