<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Controllers;

use Lightit\Backoffice\Employees\Domain\Actions\ListEmployeesAction;

class ListEmployeesController
{
    public function __invoke(ListEmployeesAction $action): \Illuminate\Http\JsonResponse
    {
        $employees = ($action)();

        return response()->json(['data'=>$employees]);
    }
}
