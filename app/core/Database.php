<?php

declare(strict_types=1);

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {

            $databasePath = dirname(__DIR__, 2) .
                '/database/database.sqlite';

            self::$connection = new PDO(
                "sqlite:$databasePath"
            );

            self::$connection->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );

            self::$connection->setAttribute(
                PDO::ATTR_DEFAULT_FETCH_MODE,
                PDO::FETCH_ASSOC
            );

            self::$connection->exec("PRAGMA foreign_keys = ON;");
        }

        return self::$connection;
    }
}