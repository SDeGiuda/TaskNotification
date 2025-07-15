<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Controllers;

use Illuminate\Http\JsonResponse;
use Lightit\Backoffice\Employees\App\Requests\StoreEmployeeRequest;
use Lightit\Backoffice\Employees\App\Resources\EmployeesResource;
use Lightit\Backoffice\Employees\Domain\Actions\StoreEmployeeAction;


class StoreEmployeesController
{
    public function __invoke(
        StoreEmployeeRequest $request,
        StoreEmployeeAction $storeEmployeeAction,
    ): \Illuminate\Http\JsonResponse {
        $employee = $storeEmployeeAction->execute($request->validated());

        return response()->json([
            'data' => new EmployeesResource($employee),
        ], JsonResponse::HTTP_CREATED);
    }
}
