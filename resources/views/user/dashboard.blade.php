@extends('layouts.user')

@section('header', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Portfolio Value Card -->
    <div class="bg-gray-800 rounded-lg p-6 neon-border card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Portfolio Value</p>
                <h3 class="text-2xl font-bold text-white mt-1">${{ number_format($portfolioValue, 2) }}</h3>
                <p class="text-green-500 text-sm mt-1">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        +{{ number_format($portfolioChange, 2) }}%
                    </span>
                </p>
            </div>
            <div class="text-green-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Active Positions Card -->
    <div class="bg-gray-800 rounded-lg p-6 neon-border card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Active Positions</p>
                <h3 class="text-2xl font-bold text-white mt-1">{{ $activePositions }}</h3>
                <p class="text-blue-500 text-sm mt-1">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        {{ $totalTrades }} Total Trades
                    </span>
                </p>
            </div>
            <div class="text-blue-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Available Balance Card -->
    <div class="bg-gray-800 rounded-lg p-6 neon-border card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Available Balance</p>
                <h3 class="text-2xl font-bold text-white mt-1">${{ number_format($availableBalance, 2) }}</h3>
                <p class="text-purple-500 text-sm mt-1">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Updated {{ $lastUpdate }}
                    </span>
                </p>
            </div>
            <div class="text-purple-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Performance Card -->
    <div class="bg-gray-800 rounded-lg p-6 neon-border card-hover">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Performance</p>
                <h3 class="text-2xl font-bold text-white mt-1">{{ number_format($performance, 2) }}%</h3>
                <p class="text-yellow-500 text-sm mt-1">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        Last 30 Days
                    </span>
                </p>
            </div>
            <div class="text-yellow-500">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Portfolio Performance Chart -->
    <div class="bg-gray-800 rounded-lg p-6 neon-border">
        <h3 class="text-lg font-semibold text-white mb-4">Portfolio Performance</h3>
        <div class="h-64">
            <canvas id="portfolioChart"></canvas>
        </div>
    </div>

    <!-- Asset Distribution Chart -->
    <div class="bg-gray-800 rounded-lg p-6 neon-border">
        <h3 class="text-lg font-semibold text-white mb-4">Asset Distribution</h3>
        <div class="h-64">
            <canvas id="distributionChart"></canvas>
        </div>
    </div>
</div>

<!-- Recent Activity Section -->
<div class="bg-gray-800 rounded-lg p-6 neon-border">
    <h3 class="text-lg font-semibold text-white mb-4">Recent Activity</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Asset</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Time</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach($recentActivity as $activity)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-8 w-8">
                                <img class="h-8 w-8 rounded-full" src="{{ $activity->asset->icon_url }}" alt="{{ $activity->asset->symbol }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-white">{{ $activity->asset->symbol }}</div>
                                <div class="text-sm text-gray-400">{{ $activity->asset->name }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $activity->type === 'buy' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($activity->type) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        {{ number_format($activity->amount, 4) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${{ number_format($activity->price, 2) }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">
                        {{ $activity->created_at->diffForHumans() }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Portfolio Performance Chart
    const portfolioCtx = document.getElementById('portfolioChart');
    if (portfolioCtx) {
        const portfolioChart = new Chart(portfolioCtx, {
            type: 'line',
            data: {
                labels: @json($portfolioHistory->pluck('date')),
                datasets: [{
                    label: 'Portfolio Value',
                    data: @json($portfolioHistory->pluck('value')),
                    borderColor: '#10b981',
                    backgroundColor: 'rgba(16, 185, 129, 0.1)',
                    borderWidth: 2,
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.7)',
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.7)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: 'rgba(255, 255, 255, 0.7)'
                        }
                    }
                }
            }
        });
    }

    // Asset Distribution Chart
    const distributionCtx = document.getElementById('distributionChart');
    if (distributionCtx) {
        const distributionChart = new Chart(distributionCtx, {
            type: 'doughnut',
            data: {
                labels: @json($assetDistribution->pluck('symbol')),
                datasets: [{
                    data: @json($assetDistribution->pluck('percentage')),
                    backgroundColor: [
                        '#10b981',
                        '#3b82f6',
                        '#8b5cf6',
                        '#f59e0b',
                        '#ef4444',
                        '#ec4899',
                        '#6366f1',
                        '#14b8a6'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            color: 'rgba(255, 255, 255, 0.7)'
                        }
                    }
                }
            }
        });
    }
});
</script>
@endsection 