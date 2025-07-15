<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Enums;

enum Status: string
{
    case Pending = 'pending';
    case InProgress = 'In Progress';
    case Completed = 'Completed';
}
