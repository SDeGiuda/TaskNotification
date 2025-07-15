<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

/** @mixin Task */
class TasksResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'employee' => $this->employee->name,
        ];
    }
}
