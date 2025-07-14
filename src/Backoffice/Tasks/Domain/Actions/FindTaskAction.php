<?php

declare(strict_types=1);
namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Tasks\Domain\Models\Task;

class FindTaskAction
{
    public function __invoke(int $id): Task
    {
        return Task::findOrFail($id);
    }
}
