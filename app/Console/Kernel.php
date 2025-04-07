<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\SyncMarketData::class,
    ];

    protected function schedule(Schedule $schedule)
    {
        // Sync market data every minute during market hours
        $schedule->command('market:sync')
            ->everyMinute()
            ->between('9:30', '16:00')
            ->weekdays()
            ->withoutOverlapping();

        // Sync crypto market data every minute (24/7)
        $schedule->command('market:sync --type=cryptocurrency')
            ->everyMinute()
            ->withoutOverlapping();

        // Full sync every hour
        $schedule->command('market:sync --force')
            ->hourly()
            ->withoutOverlapping();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
} 