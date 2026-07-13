<?php

declare(strict_types=1);

namespace App\Models;

class Job
{
    public ?int $id = null;

    public string $keyword;

    public string $location;

    public int $maxResults;

    public string $status;

    public string $createdAt;
}