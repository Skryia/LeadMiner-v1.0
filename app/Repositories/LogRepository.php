<?php

declare(strict_types=1);

namespace App\Repositories;

class LogRepository extends BaseRepository
{
    public function create(
        int $jobId,
        string $type,
        string $message
    ): int {

        $statement = $this->pdo->prepare(
            "
            INSERT INTO logs
            (
                job_id,
                type,
                message,
                created_at
            )
            VALUES
            (
                ?,
                ?,
                ?,
                ?
            )
            "
        );

        $statement->execute([
            $jobId,
            $type,
            $message,
            date('Y-m-d H:i:s')
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function getByJob(
        int $jobId
    ): array {

        $statement = $this->pdo->prepare(
            "
            SELECT *
            FROM logs
            WHERE job_id = ?
            ORDER BY id ASC
            "
        );

        $statement->execute([
            $jobId
        ]);

        return $statement->fetchAll();
    }
}