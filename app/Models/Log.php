<?php

declare(strict_types=1);

namespace App\Models;

class Log
{
    public ?int $id = null;

    public int $jobId;

    public string $type;

    public string $message;

    public string $createdAt;
}