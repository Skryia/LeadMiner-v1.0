<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use App\Repositories\JobRepository;
use App\Services\LoggerService;

$jobs = new JobRepository();
$logger = new LoggerService();

$jobId = $jobs->create([
    'keyword' => 'African Churches',
    'location' => 'Southampton',
    'max_results' => 500
]);

echo "Job ID: {$jobId}" . PHP_EOL;

$logger->info(
    $jobId,
    'Search started'
);

$logger->success(
    $jobId,
    'Business found'
);

$logger->warning(
    $jobId,
    'Website not listed'
);

$logger->error(
    $jobId,
    'Instagram crawl failed'
);

echo "Logs written successfully." . PHP_EOL;