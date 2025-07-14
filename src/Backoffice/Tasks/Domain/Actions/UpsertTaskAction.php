<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\Domain\Actions;

use Lightit\Backoffice\Employees\App\Notifications\TaskAssignedNotification;
use Lightit\Backoffice\Employees\App\Notifications\TaskUnassignedNotification;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class UpsertTaskAction
{
    /**
     * @param array<string, mixed> $data
     */
    public function __invoke(array $data): Task
    {
        /** @var ?Task $task */
        try {
            $task = Task::find($data['id']);

            if ($task) {
                $formerEmployee = $task->employee;
                $task->update($data);

                $task->load('employee');

                if ($task->employee->id !== $formerEmployee->id) {
                    $task->employee->notify(new TaskAssignedNotification($task));
                    $formerEmployee->notify(new TaskUnassignedNotification($task));
                }

                return $task;
            }
        } catch (\Throwable) {
        }

        $task = Task::create($data);
        $employee = $task->employee;
        $employee->notify(new TaskAssignedNotification($task));

        return $task;
    }
}
