<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Services\JobService;

$service = new JobService();

$jobId = $service->createJob([
    'keyword' => 'African Churches',
    'location' => 'Southampton',
    'max_results' => 500
]);

echo "Created Job: {$jobId}" . PHP_EOL;

$service->startJob($jobId);

sleep(1);

$service->completeJob($jobId);

echo "Completed Job: {$jobId}" . PHP_EOL;

print_r(
    $service->find($jobId)
);