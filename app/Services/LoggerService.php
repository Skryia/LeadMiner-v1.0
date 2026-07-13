<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\LogRepository;

class LoggerService
{
    private LogRepository $repository;

    public const INFO = 'INFO';
    public const SUCCESS = 'SUCCESS';
    public const WARNING = 'WARNING';
    public const ERROR = 'ERROR';

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
            self::INFO,
            $message
        );
    }

    public function success(
        int $jobId,
        string $message
    ): int {
        return $this->repository->create(
            $jobId,
            self::SUCCESS,
            $message
        );
    }

    public function warning(
        int $jobId,
        string $message
    ): int {
        return $this->repository->create(
            $jobId,
            self::WARNING,
            $message
        );
    }

    public function error(
        int $jobId,
        string $message
    ): int {
        return $this->repository->create(
            $jobId,
            self::ERROR,
            $message
        );
    }
}