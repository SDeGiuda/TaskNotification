<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employees\Domain\Actions\ListEmployeesAction;

class ListEmployeesController
{
    public function __invoke(ListEmployeesAction $listEmployeesAction): JsonResponse
    {
        $employees = $listEmployeesAction->execute(); // $employees = $listEmployeesAction->execute();

        return response()->json(['data' => $employees]);
    }
}
