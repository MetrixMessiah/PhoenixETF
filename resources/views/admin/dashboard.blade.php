<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-white mb-6">Admin Dashboard</h2>
                    
                    <!-- Stats Overview -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                        <!-- Total Users -->
                        <div class="bg-gray-700 rounded-lg p-4 shadow-md">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-indigo-500 bg-opacity-20">
                                    <svg class="h-8 w-8 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-400">Total Users</p>
                                    <div class="flex items-baseline">
                                        <p class="text-2xl font-semibold text-white">{{ $totalUsers }}</p>
                                        <p class="ml-2 text-sm text-green-500">+{{ $newUsersThisMonth }}</p>
                                    </div>
                                    <p class="text-xs text-gray-400 mt-1">{{ $activeUsers }} active / {{ $blockedUsers }} blocked</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Total Portfolio Value -->
                        <div class="bg-gray-700 rounded-lg p-4 shadow-md">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-500 bg-opacity-20">
                                    <svg class="h-8 w-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-400">Total Portfolio Value</p>
                                    <div class="flex items-baseline">
                                        <p class="text-2xl font-semibold text-white">${{ number_format($totalPortfolioValue, 2) }}</p>
                                        <p class="ml-2 text-sm {{ $portfolioChange >= 0 ? 'text-green-500' : 'text-red-500' }}">
                                            {{ $portfolioChange >= 0 ? '+' : '' }}{{ number_format($portfolioChange, 2) }}%
                                        </p>
                                    </div>
                                    <p class="text-xs text-gray-400 mt-1">Across {{ $totalAccounts }} accounts</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Total Balance -->
                        <div class="bg-gray-700 rounded-lg p-4 shadow-md">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-blue-500 bg-opacity-20">
                                    <svg class="h-8 w-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-400">Total Balance</p>
                                    <div class="flex items-baseline">
                                        <p class="text-2xl font-semibold text-white">${{ number_format($totalBalance, 2) }}</p>
                                        <p class="ml-2 text-sm {{ $balanceChange >= 0 ? 'text-green-500' : 'text-red-500' }}">
                                            {{ $balanceChange >= 0 ? '+' : '' }}{{ number_format($balanceChange, 2) }}%
                                        </p>
                                    </div>
                                    <p class="text-xs text-gray-400 mt-1">Last 30 days</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Trades Overview -->
                        <div class="bg-gray-700 rounded-lg p-4 shadow-md">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-yellow-500 bg-opacity-20">
                                    <svg class="h-8 w-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-400">Trades</p>
                                    <div class="flex items-baseline">
                                        <p class="text-2xl font-semibold text-white">{{ $openTrades }} / {{ $closedTrades }}</p>
                                        <p class="ml-2 text-sm text-gray-400">open/closed</p>
                                    </div>
                                    <p class="text-xs text-gray-400 mt-1">Total PnL: ${{ number_format($totalPnL, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tabs Navigation -->
                    <div class="border-b border-gray-700 mb-6">
                        <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                            <button class="tab-button active border-indigo-500 text-indigo-500 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="users">
                                Users
                            </button>
                            <button class="tab-button border-transparent text-gray-400 hover:text-gray-300 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="trades">
                                Trades
                            </button>
                            <button class="tab-button border-transparent text-gray-400 hover:text-gray-300 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="assets">
                                Assets
                            </button>
                            <button class="tab-button border-transparent text-gray-400 hover:text-gray-300 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="agents">
                                Agents
                            </button>
                            <button class="tab-button border-transparent text-gray-400 hover:text-gray-300 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="settings">
                                Settings
                            </button>
                            <button class="tab-button border-transparent text-gray-400 hover:text-gray-300 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" data-tab="api">
                                API
                            </button>
                        </nav>
                    </div>
                    
                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Users Tab -->
                        <div id="users-tab" class="tab-pane active">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-white">User Management</h3>
                                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                    Add New User
                                </button>
                            </div>
                            
                            <div class="bg-gray-700 rounded-lg overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-600">
                                    <thead class="bg-gray-600">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                User
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Portfolio Value
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Balance
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Open Trades
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-700 divide-y divide-gray-600">
                                        @foreach($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-white">
                                                            {{ $user->name }}
                                                        </div>
                                                        <div class="text-sm text-gray-400">
                                                            {{ $user->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $user->is_active ? 'Active' : 'Blocked' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                ${{ number_format($user->portfolio_value, 2) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                ${{ number_format($user->balance, 2) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $user->open_trades_count }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-indigo-400 hover:text-indigo-300 mr-3">Edit</button>
                                                <button class="text-red-400 hover:text-red-300">Block</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Trades Tab -->
                        <div id="trades-tab" class="tab-pane hidden">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-white">Trade Management</h3>
                                <div class="flex space-x-2">
                                    <select class="bg-gray-700 border-gray-600 text-white rounded-md text-sm">
                                        <option>All Assets</option>
                                        <option>BTC/USD</option>
                                        <option>ETH/USD</option>
                                        <option>XRP/USD</option>
                                    </select>
                                    <select class="bg-gray-700 border-gray-600 text-white rounded-md text-sm">
                                        <option>All Status</option>
                                        <option>Open</option>
                                        <option>Closed</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="bg-gray-700 rounded-lg overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-600">
                                    <thead class="bg-gray-600">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                ID
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                User
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Asset
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Type
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Entry Price
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Current Price
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                PnL
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-700 divide-y divide-gray-600">
                                        @foreach($trades as $trade)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                #{{ $trade->id }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-white">{{ $trade->user->name }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $trade->asset->symbol }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $trade->type === 'buy' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ ucfirst($trade->type) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                ${{ number_format($trade->entry_price, 2) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                ${{ number_format($trade->current_price, 2) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm {{ $trade->pnl >= 0 ? 'text-green-500' : 'text-red-500' }}">
                                                ${{ number_format($trade->pnl, 2) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $trade->status === 'open' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800' }}">
                                                    {{ ucfirst($trade->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-indigo-400 hover:text-indigo-300">Edit</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Assets Tab -->
                        <div id="assets-tab" class="tab-pane hidden">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-white">Tradable Assets</h3>
                                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                    Add New Asset
                                </button>
                            </div>
                            
                            <div class="bg-gray-700 rounded-lg overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-600">
                                    <thead class="bg-gray-600">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Symbol
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Name
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Category
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Current Price
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                24h Change
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-700 divide-y divide-gray-600">
                                        @foreach($assets as $asset)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $asset->symbol }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $asset->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $asset->category }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                ${{ number_format($asset->current_price, 2) }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm {{ $asset->price_change_24h >= 0 ? 'text-green-500' : 'text-red-500' }}">
                                                {{ $asset->price_change_24h >= 0 ? '+' : '' }}{{ number_format($asset->price_change_24h, 2) }}%
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $asset->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $asset->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-indigo-400 hover:text-indigo-300 mr-3">Edit</button>
                                                <button class="text-red-400 hover:text-red-300">Disable</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Agents Tab -->
                        <div id="agents-tab" class="tab-pane hidden">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-white">Agent Management</h3>
                                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                    Add New Agent
                                </button>
                            </div>
                            
                            <div class="bg-gray-700 rounded-lg overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-600">
                                    <thead class="bg-gray-600">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Agent
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Managed Users
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Managed Trades
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Last Login
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-700 divide-y divide-gray-600">
                                        @foreach($agents as $agent)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <img class="h-10 w-10 rounded-full" src="{{ $agent->profile_photo_url }}" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-white">
                                                            {{ $agent->name }}
                                                        </div>
                                                        <div class="text-sm text-gray-400">
                                                            {{ $agent->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $agent->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $agent->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $agent->managed_users_count }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $agent->managed_trades_count }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $agent->last_login_at->diffForHumans() }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-indigo-400 hover:text-indigo-300 mr-3">Edit</button>
                                                <button class="text-red-400 hover:text-red-300">Deactivate</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Settings Tab -->
                        <div id="settings-tab" class="tab-pane hidden">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-white">Global Settings</h3>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Account Settings -->
                                <div class="bg-gray-700 rounded-lg p-6">
                                    <h4 class="text-lg font-medium text-white mb-4">Account Settings</h4>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="default-leverage" class="block text-sm font-medium text-gray-300">
                                                Default Leverage
                                            </label>
                                            <div class="mt-1">
                                                <input type="number" name="default-leverage" id="default-leverage" class="bg-gray-600 border-gray-500 text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md" value="10">
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label for="default-margin" class="block text-sm font-medium text-gray-300">
                                                Default Margin Requirement (%)
                                            </label>
                                            <div class="mt-1">
                                                <input type="number" name="default-margin" id="default-margin" class="bg-gray-600 border-gray-500 text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md" value="5">
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label for="stopout-level" class="block text-sm font-medium text-gray-300">
                                                Stopout Level (%)
                                            </label>
                                            <div class="mt-1">
                                                <input type="number" name="stopout-level" id="stopout-level" class="bg-gray-600 border-gray-500 text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md" value="50">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Payment Settings -->
                                <div class="bg-gray-700 rounded-lg p-6">
                                    <h4 class="text-lg font-medium text-white mb-4">Payment Settings</h4>
                                    
                                    <div class="space-y-4">
                                        <div>
                                            <label for="min-deposit" class="block text-sm font-medium text-gray-300">
                                                Minimum Deposit ($)
                                            </label>
                                            <div class="mt-1">
                                                <input type="number" name="min-deposit" id="min-deposit" class="bg-gray-600 border-gray-500 text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md" value="100">
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label for="min-withdrawal" class="block text-sm font-medium text-gray-300">
                                                Minimum Withdrawal ($)
                                            </label>
                                            <div class="mt-1">
                                                <input type="number" name="min-withdrawal" id="min-withdrawal" class="bg-gray-600 border-gray-500 text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md" value="50">
                                            </div>
                                        </div>
                                        
                                        <div>
                                            <label for="withdrawal-fee" class="block text-sm font-medium text-gray-300">
                                                Withdrawal Fee (%)
                                            </label>
                                            <div class="mt-1">
                                                <input type="number" name="withdrawal-fee" id="withdrawal-fee" class="bg-gray-600 border-gray-500 text-white shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm rounded-md" value="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- KYC Settings -->
                                <div class="bg-gray-700 rounded-lg p-6">
                                    <h4 class="text-lg font-medium text-white mb-4">KYC Settings</h4>
                                    
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="kyc-required" name="kyc-required" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-500 rounded bg-gray-600">
                                            <label for="kyc-required" class="ml-2 block text-sm text-gray-300">
                                                Require KYC for trading
                                            </label>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <input id="kyc-required-deposit" name="kyc-required-deposit" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-500 rounded bg-gray-600">
                                            <label for="kyc-required-deposit" class="ml-2 block text-sm text-gray-300">
                                                Require KYC for deposits
                                            </label>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <input id="kyc-required-withdrawal" name="kyc-required-withdrawal" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-500 rounded bg-gray-600">
                                            <label for="kyc-required-withdrawal" class="ml-2 block text-sm text-gray-300">
                                                Require KYC for withdrawals
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Notification Settings -->
                                <div class="bg-gray-700 rounded-lg p-6">
                                    <h4 class="text-lg font-medium text-white mb-4">Notification Settings</h4>
                                    
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <input id="email-notifications" name="email-notifications" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-500 rounded bg-gray-600">
                                            <label for="email-notifications" class="ml-2 block text-sm text-gray-300">
                                                Enable Email Notifications
                                            </label>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <input id="sms-notifications" name="sms-notifications" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-500 rounded bg-gray-600">
                                            <label for="sms-notifications" class="ml-2 block text-sm text-gray-300">
                                                Enable SMS Notifications
                                            </label>
                                        </div>
                                        
                                        <div class="flex items-center">
                                            <input id="push-notifications" name="push-notifications" type="checkbox" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-500 rounded bg-gray-600">
                                            <label for="push-notifications" class="ml-2 block text-sm text-gray-300">
                                                Enable Push Notifications
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-end">
                                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                    Save Settings
                                </button>
                            </div>
                        </div>
                        
                        <!-- API Tab -->
                        <div id="api-tab" class="tab-pane hidden">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-medium text-white">API Management</h3>
                                <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                    Generate New API Key
                                </button>
                            </div>
                            
                            <div class="bg-gray-700 rounded-lg overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-600">
                                    <thead class="bg-gray-600">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                API Key
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Created
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Last Used
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-gray-700 divide-y divide-gray-600">
                                        @foreach($apiKeys as $apiKey)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-white">{{ $apiKey->key }}</div>
                                                <div class="text-xs text-gray-400">Created by: {{ $apiKey->created_by }}</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $apiKey->created_at->format('M d, Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                {{ $apiKey->last_used_at ? $apiKey->last_used_at->format('M d, Y H:i') : 'Never' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $apiKey->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    {{ $apiKey->is_active ? 'Active' : 'Revoked' }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button class="text-indigo-400 hover:text-indigo-300 mr-3">Edit</button>
                                                <button class="text-red-400 hover:text-red-300">Revoke</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab switching functionality
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabPanes = document.querySelectorAll('.tab-pane');
            
            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove active class from all buttons and panes
                    tabButtons.forEach(btn => {
                        btn.classList.remove('border-indigo-500', 'text-indigo-500');
                        btn.classList.add('border-transparent', 'text-gray-400');
                    });
                    
                    tabPanes.forEach(pane => {
                        pane.classList.add('hidden');
                    });
                    
                    // Add active class to clicked button
                    button.classList.remove('border-transparent', 'text-gray-400');
                    button.classList.add('border-indigo-500', 'text-indigo-500');
                    
                    // Show corresponding pane
                    const tabId = button.getAttribute('data-tab');
                    document.getElementById(`${tabId}-tab`).classList.remove('hidden');
                });
            });
        });
    </script>
    @endpush
</x-app-layout> 