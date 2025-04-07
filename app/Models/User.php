<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
        'balance',
        'margin',
        'leverage',
        'stopout_level',
        'kyc_documents',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
        'balance' => 'decimal:2',
        'margin' => 'decimal:2',
        'leverage' => 'decimal:2',
        'stopout_level' => 'decimal:2',
        'kyc_documents' => 'array',
    ];

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isAgent()
    {
        return $this->role === 'agent';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function getEquity()
    {
        return $this->balance + $this->trades()->where('status', 'open')->sum('pnl');
    }

    public function getFreeMargin()
    {
        return $this->getEquity() - $this->margin;
    }

    public function getMarginLevel()
    {
        if ($this->margin <= 0) {
            return 100;
        }
        return ($this->getEquity() / $this->margin) * 100;
    }
} 