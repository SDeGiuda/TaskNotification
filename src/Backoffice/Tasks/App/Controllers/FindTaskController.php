<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\Domain\Models\Task;

class FindTaskController
{
    public function __invoke(Task $task): JsonResponse
    {
        return response()->json(['data' => $task]);
    }
}
