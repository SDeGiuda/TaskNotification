<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Resources\TasksResource;
use Lightit\Backoffice\Tasks\Domain\Actions\ListTasksAction;

class ListTasksController
{
    public function __invoke(ListTasksAction $listTasksAction): JsonResponse
    {
        $tasks = $listTasksAction->execute();

        return response()->json(['data' => TasksResource::collection($tasks)]);
    }
}
