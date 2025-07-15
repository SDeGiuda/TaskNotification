<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Resources\TasksResource;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class FindTaskController
{
    public function __invoke(Task $task): JsonResponse
    {
        return response()->json([
            'data' => new TasksResource($task),
        ], JsonResponse::HTTP_OK);
    }
}
