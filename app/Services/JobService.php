<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\JobRepository;

class JobService
{
    private JobRepository $jobs;

    private LoggerService $logger;

    public function __construct()
    {
        $this->jobs = new JobRepository();
        $this->logger = new LoggerService();
    }

    public function createJob(
        array $data
    ): int {

        $jobId = $this->jobs->create($data);

        $this->logger->info(
            $jobId,
            'Job created'
        );

        return $jobId;
    }

    public function startJob(
        int $jobId
    ): void {

        $this->jobs->markRunning($jobId);

        $this->logger->info(
            $jobId,
            'Job started'
        );
    }

    public function completeJob(
        int $jobId
    ): void {

        $this->jobs->markCompleted($jobId);

        $this->logger->success(
            $jobId,
            'Job completed'
        );
    }

    public function failJob(
        int $jobId,
        string $reason
    ): void {

        $this->jobs->markFailed($jobId);

        $this->logger->error(
            $jobId,
            $reason
        );
    }

    public function find(
        int $jobId
    ): ?array {

        return $this->jobs->find($jobId);
    }

    public function all(): array
    {
        return $this->jobs->all();
    }
}