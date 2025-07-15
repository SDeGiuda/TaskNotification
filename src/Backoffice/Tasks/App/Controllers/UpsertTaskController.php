<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\App\Requests\UpsertTaskRequest;
use Lightit\Backoffice\Tasks\App\Resources\TasksResource;
use Lightit\Backoffice\Tasks\Domain\Actions\UpsertTaskAction;

class UpsertTaskController
{
    public function __invoke(UpsertTaskRequest $request, UpsertTaskAction $upsertTaskAction): JsonResponse
    {
        $task = $upsertTaskAction->execute($request->validated());

        $status = $task->wasRecentlyCreated
            ? JsonResponse::HTTP_CREATED
            : JsonResponse::HTTP_OK;

        return response()->json([
            'data' => new TasksResource($task),
        ], $status);
    }
}
