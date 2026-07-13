<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Core\Database;
use PDO;

abstract class BaseRepository
{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }
}