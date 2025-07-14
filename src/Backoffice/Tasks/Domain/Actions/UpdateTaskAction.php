<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Employees\App\Notifications\TaskAssignedNotification;
use Lightit\Backoffice\Employees\App\Notifications\TaskUnassignedNotification;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class UpdateTaskAction
{
    /**
     * @param array<string, mixed> $data
     */
    public function __invoke(Task $task, array $data): Task
    {
        $former_employee = $task->employee;
        $task->update($data);
        $task->load('employee');

        if ($task->employee->id !== $former_employee->id) {
            $task->employee->notify(new TaskAssignedNotification($task));
            $former_employee->notify(new TaskUnassignedNotification($task));
        }

        return $task;
    }
}
