<?php

declare(strict_types=1);

namespace App\Enums;

enum JobStatus: string
{
    case PENDING = 'pending';

    case RUNNING = 'running';

    case COMPLETED = 'completed';

    case FAILED = 'failed';

    case CANCELLED = 'cancelled';
}