<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Repositories\JobRepository;
use App\Repositories\LogRepository;

$jobs = new JobRepository();
$logs = new LogRepository();

$jobId = $jobs->create([
    'keyword' => 'African Churches',
    'location' => 'Southampton',
    'max_results' => 500
]);

echo "Job created: {$jobId}" . PHP_EOL;

$logs->create(
    $jobId,
    'INFO',
    'Job created successfully'
);

echo "Log created" . PHP_EOL;

print_r(
    $jobs->find($jobId)
);

print_r(
    $logs->getByJob($jobId)
);