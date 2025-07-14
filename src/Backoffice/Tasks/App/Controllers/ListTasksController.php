<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Tasks\Domain\Actions\ListTasksAction;

class ListTasksController
{
    public function __invoke(ListTasksAction $action): JsonResponse
    {
        $tasks = ($action)();

        return response()->json(['data' => $tasks]);
    }
}
