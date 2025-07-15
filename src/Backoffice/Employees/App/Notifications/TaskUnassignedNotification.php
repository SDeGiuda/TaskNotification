<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class TaskUnassignedNotification extends Notification
{
    use Queueable;

    public function __construct(public Task $task) {}

    /**
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return new MailMessage()
            ->subject('Task Assigned to someone else')
            ->markdown('mail.unassigned-task', [
                'task' => $this->task,
                'employee' => $notifiable,
            ]);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'task_id' => $this->task->id,
            'task_title' => $this->task->title,
            'task_description' => $this->task->description,
        ];
    }
}
