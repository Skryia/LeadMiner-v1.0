<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Core\Database;

echo PHP_EOL;
echo "==========================================" . PHP_EOL;
echo " LeadMiner Database Migration" . PHP_EOL;
echo "==========================================" . PHP_EOL;
echo PHP_EOL;

try {

    $pdo = Database::getConnection();

    $migrationDirectory = __DIR__ . '/migrations';

    $migrationFiles = glob($migrationDirectory . '/*.sql');

    sort($migrationFiles);

    if (empty($migrationFiles)) {
        echo "No migration files found." . PHP_EOL;
        exit(0);
    }

    foreach ($migrationFiles as $migrationFile) {

        $fileName = basename($migrationFile);

        echo "Running: {$fileName} ... ";

        $sql = file_get_contents($migrationFile);

        $pdo->exec($sql);

        echo "DONE" . PHP_EOL;
    }

    echo PHP_EOL;
    echo "Database migrations completed successfully." . PHP_EOL;

} catch (Throwable $exception) {

    echo PHP_EOL;
    echo "Migration failed!" . PHP_EOL;
    echo $exception->getMessage() . PHP_EOL;
    exit(1);
}