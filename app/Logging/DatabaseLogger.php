<?php
namespace App\Logging;

use Monolog\Logger;
use App\Logging\CustomDatabaseHandler;

class DatabaseLogger
{
    public function __invoke(array $config)
    {
        $level = $config['level'] ?? Logger::DEBUG;
        $logger = new Logger('database');
        $logger->pushHandler(new CustomDatabaseHandler($level));
        return $logger;
    }
}

