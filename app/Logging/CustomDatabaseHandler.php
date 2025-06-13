<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use Illuminate\Support\Facades\DB;
use Monolog\LogRecord; // <-- Add this import

class CustomDatabaseHandler extends AbstractProcessingHandler
{
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
    }

    // Update the signature to match Monolog 3.x
    protected function write(LogRecord $record): void
    {
        DB::table('logs')->insert([
            'level' => $record->level->getName() ?? '',
            'message' => $record->message ?? '',
            'context' => !empty($record->context) ? json_encode($record->context) : null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
