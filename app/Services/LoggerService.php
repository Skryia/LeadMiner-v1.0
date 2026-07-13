<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\LogRepository;
use App\Enums\LogType;

class LoggerService
{
    private LogRepository $repository;


    public function __construct()
    {
        $this->repository = new LogRepository();
    }

    public function info(
        int $jobId,
        string $message
    ): int {
        return $this->repository->create(
            $jobId,
            LogType::INFO->value,
            $message
        );
    }

    public function success(
        int $jobId,
        string $message
    ): int {
        return $this->repository->create(
            $jobId,
            LogType::SUCCESS->value,
            $message
        );
    }

    public function warning(
        int $jobId,
        string $message
    ): int {
        return $this->repository->create(
            $jobId,
            LogType::WARNING->value,
            $message
        );
    }

    public function error(
        int $jobId,
        string $message
    ): int {
        return $this->repository->create(
            $jobId,
            LogType::ERROR->value,
            $message
        );
    }
}