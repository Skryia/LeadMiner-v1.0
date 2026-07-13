<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Enums\JobStatus;

class JobRepository extends BaseRepository
{
    public function create(array $data): int
    {
        $statement = $this->pdo->prepare(
            "
            INSERT INTO jobs
            (
                keyword,
                location,
                max_results,
                include_facebook,
                include_instagram,
                include_website,
                include_email,
                include_phone,
                status,
                created_at
            )
            VALUES
            (
                :keyword,
                :location,
                :max_results,
                :include_facebook,
                :include_instagram,
                :include_website,
                :include_email,
                :include_phone,
                :status,
                :created_at
            )
            "
        );

        $statement->execute([
            'keyword'           => $data['keyword'],
            'location'          => $data['location'],
            'max_results'       => $data['max_results'],
            'include_facebook'  => $data['include_facebook'] ?? 1,
            'include_instagram' => $data['include_instagram'] ?? 1,
            'include_website'   => $data['include_website'] ?? 1,
            'include_email'     => $data['include_email'] ?? 1,
            'include_phone'     => $data['include_phone'] ?? 1,
            'status'            => $data['status'] ?? JobStatus::PENDING->value,
            'created_at'        => date('Y-m-d H:i:s')
        ]);

        return (int) $this->pdo->lastInsertId();
    }

    public function find(int $id): ?array
    {
        $statement = $this->pdo->prepare(
            "SELECT * FROM jobs WHERE id = ?"
        );

        $statement->execute([$id]);

        $job = $statement->fetch();

        return $job ?: null;
    }

    public function all(): array
    {
        $statement = $this->pdo->query(
            "
            SELECT *
            FROM jobs
            ORDER BY id DESC
            "
        );

        return $statement->fetchAll();
    }

    public function updateStatus(
        int $id,
        string $status
    ): bool {
        $statement = $this->pdo->prepare(
            "
            UPDATE jobs
            SET status = ?
            WHERE id = ?
            "
        );

        return $statement->execute([
            $status,
            $id
        ]);
    }

    public function markRunning(int $id): bool
    {
        $statement = $this->pdo->prepare(
            "
            UPDATE jobs
            SET
                status = ?,
                started_at = ?
            WHERE id = ?
            "
        );

        return $statement->execute([
            JobStatus::RUNNING->value,
            date('Y-m-d H:i:s'),
            $id
        ]);
    }

    public function markCompleted(int $id): bool
    {
        $statement = $this->pdo->prepare(
            "
            UPDATE jobs
            SET
                status = ?,
                completed_at = ?
            WHERE id = ?
            "
        );

        return $statement->execute([
            JobStatus::COMPLETED->value,
            date('Y-m-d H:i:s'),
            $id
        ]);
    }

    public function markFailed(int $id): bool
    {
        $statement = $this->pdo->prepare(
            "
            UPDATE jobs
            SET
                status = ?,
                completed_at = ?
            WHERE id = ?
            "
        );

        return $statement->execute([
            JobStatus::FAILED->value,
            date('Y-m-d H:i:s'),
            $id
        ]);
    }
}