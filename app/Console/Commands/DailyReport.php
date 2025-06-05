<?php

namespace App\Console\Commands;
use Illuminate\Console\Scheduling\Attributes\AsScheduled;
use Illuminate\Console\Command;
use Illuminate\Console\Attributes\AsCommand;
use Illuminate\Support\Facades\Log;








class DailyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:daily-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        // dd(12121);
          Log::info('Generating daily report...');
    }
}
