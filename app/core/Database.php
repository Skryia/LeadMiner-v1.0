<?php

namespace App\Core;

use PDO;

class Database
{
    private static ?PDO $pdo = null;

    public static function connection(): PDO
    {
        if (self::$pdo === null) {
            self::$pdo = new PDO(
                'sqlite:' . __DIR__ . '/../../database/database.sqlite'
            );

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$pdo;
    }
}
