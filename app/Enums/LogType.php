<?php

declare(strict_types=1);

namespace App\Enums;

enum LogType: string
{
    case INFO = 'INFO';
    case SUCCESS = 'SUCCESS';
    case WARNING = 'WARNING';
    case ERROR = 'ERROR';
}