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

    /*
     * Ensure schema_migrations exists.
     */
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS schema_migrations
        (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            filename TEXT NOT NULL UNIQUE,
            executed_at TEXT NOT NULL
        )
    ");

    foreach ($migrationFiles as $migrationFile) {

        $fileName = basename($migrationFile);

        $statement = $pdo->prepare(
            "SELECT COUNT(*) FROM schema_migrations WHERE filename = ?"
        );

        $statement->execute([$fileName]);

        $alreadyExecuted = (int) $statement->fetchColumn();

        if ($alreadyExecuted > 0) {

            echo "Skipping: {$fileName} (already executed)" . PHP_EOL;

            continue;
        }

        echo "Running: {$fileName} ... ";

        $sql = file_get_contents($migrationFile);

        $pdo->exec($sql);

        $insert = $pdo->prepare(
            "INSERT INTO schema_migrations
             (filename, executed_at)
             VALUES (?, ?)"
        );

        $insert->execute([
            $fileName,
            date('Y-m-d H:i:s')
        ]);

        echo "DONE" . PHP_EOL;
    }

    echo PHP_EOL;
    echo "Migration completed successfully." . PHP_EOL;

} catch (Throwable $exception) {

    echo PHP_EOL;
    echo "Migration failed!" . PHP_EOL;
    echo $exception->getMessage() . PHP_EOL;

    exit(1);
}