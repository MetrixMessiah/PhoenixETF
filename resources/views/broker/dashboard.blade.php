@extends('layouts.broker')

@section('header', 'Broker Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Clients Card -->
    <div class="bg-gray-800 rounded-lg shadow-lg p-6 card-hover neon-border">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Total Clients</p>
                <h3 class="text-2xl font-bold text-white mt-1">{{ number_format($totalClients) }}</h3>
                <p class="text-green-400 text-sm mt-2">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        +{{ number_format($clientGrowth) }}% this month
                    </span>
                </p>
            </div>
            <div class="bg-blue-500 bg-opacity-20 rounded-full p-3">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Active Trades Card -->
    <div class="bg-gray-800 rounded-lg shadow-lg p-6 card-hover neon-border">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Active Trades</p>
                <h3 class="text-2xl font-bold text-white mt-1">{{ number_format($activeTrades) }}</h3>
                <p class="text-blue-400 text-sm mt-2">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        ${{ number_format($totalVolume) }} volume
                    </span>
                </p>
            </div>
            <div class="bg-blue-500 bg-opacity-20 rounded-full p-3">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Portfolio Value Card -->
    <div class="bg-gray-800 rounded-lg shadow-lg p-6 card-hover neon-border">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Portfolio Value</p>
                <h3 class="text-2xl font-bold text-white mt-1">${{ number_format($portfolioValue) }}</h3>
                <p class="text-green-400 text-sm mt-2">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        +{{ number_format($portfolioGrowth) }}% this month
                    </span>
                </p>
            </div>
            <div class="bg-green-500 bg-opacity-20 rounded-full p-3">
                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>

    <!-- Success Rate Card -->
    <div class="bg-gray-800 rounded-lg shadow-lg p-6 card-hover neon-border">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-400 text-sm">Success Rate</p>
                <h3 class="text-2xl font-bold text-white mt-1">{{ number_format($successRate) }}%</h3>
                <p class="text-yellow-400 text-sm mt-2">
                    <span class="flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ number_format($totalTrades) }} total trades
                    </span>
                </p>
            </div>
            <div class="bg-yellow-500 bg-opacity-20 rounded-full p-3">
                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Charts Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
    <!-- Trading Volume Chart -->
    <div class="bg-gray-800 rounded-lg shadow-lg p-6 neon-border">
        <h3 class="text-lg font-semibold text-white mb-4">Trading Volume</h3>
        <div class="h-64">
            <canvas id="tradingChart"></canvas>
        </div>
    </div>

    <!-- Portfolio Performance Chart -->
    <div class="bg-gray-800 rounded-lg shadow-lg p-6 neon-border">
        <h3 class="text-lg font-semibold text-white mb-4">Portfolio Performance</h3>
        <div class="h-64">
            <canvas id="portfolioChart"></canvas>
        </div>
    </div>
</div>

<!-- Recent Activity Section -->
<div class="bg-gray-800 rounded-lg shadow-lg p-6 neon-border">
    <h3 class="text-lg font-semibold text-white mb-4">Recent Activity</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700">
            <thead>
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Client</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Action</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Asset</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Amount</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Time</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach($recentActivity as $activity)
                <tr class="hover:bg-gray-700 transition-colors duration-150">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-8 w-8">
                                <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($activity->client->name) }}&background=3b82f6&color=fff" alt="{{ $activity->client->name }}">
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-white">{{ $activity->client->name }}</div>
                                <div class="text-sm text-gray-400">{{ $activity->client->email }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $activity->action === 'buy' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ ucfirst($activity->action) }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        {{ $activity->asset->symbol }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${{ number_format($activity->amount, 2) }}
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
        new Chart(portfolioCtx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Portfolio Value',
                    data: [],
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
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
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.1)'
                        },
                        ticks: {
                            color: 'rgba(255, 255, 255, 0.7)'
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
        
        // Simulate real-time data
        setInterval(() => {
            const now = new Date();
            const value = Math.floor(Math.random() * 100000) + 50000;
            
            portfolioChart.data.labels.push(now);
            portfolioChart.data.datasets[0].data.push(value);
            
            if (portfolioChart.data.labels.length > 20) {
                portfolioChart.data.labels.shift();
                portfolioChart.data.datasets[0].data.shift();
            }
            
            portfolioChart.update();
        }, 3000);
    }
});
</script>
@endsection 