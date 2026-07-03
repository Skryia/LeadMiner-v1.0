<?php

namespace App\Core;

class Logger
{
    public static function info(string $message): void
    {
        self::write("INFO", $message);
    }

    public static function error(string $message): void
    {
        self::write("ERROR", $message);
    }

    private static function write(string $level, string $message): void
    {
        $date = date('Y-m-d H:i:s');
        $log = "[$date] [$level] $message" . PHP_EOL;

        file_put_contents(
            __DIR__ . '/../../storage/logs/app.log',
            $log,
            FILE_APPEND
        );
    }
}
