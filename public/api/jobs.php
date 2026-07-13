<?php

declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Services\JobService;

header('Content-Type: application/json');

try {

    $service = new JobService();

    $jobId = $service->createJob([
        'keyword' => $_POST['keyword'] ?? '',
        'location' => $_POST['location'] ?? '',
        'max_results' => (int) ($_POST['max_results'] ?? 100),

        'include_facebook' =>
            isset($_POST['include_facebook']) ? 1 : 0,

        'include_instagram' =>
            isset($_POST['include_instagram']) ? 1 : 0,

        'include_website' =>
            isset($_POST['include_website']) ? 1 : 0,

        'include_email' =>
            isset($_POST['include_email']) ? 1 : 0,

        'include_phone' =>
            isset($_POST['include_phone']) ? 1 : 0
    ]);

    echo json_encode([
        'success' => true,
        'job_id' => $jobId
    ]);

} catch (Throwable $exception) {

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'message' => $exception->getMessage()
    ]);
}