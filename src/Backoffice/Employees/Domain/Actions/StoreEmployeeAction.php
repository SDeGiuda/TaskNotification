<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\Domain\Actions;

use Lightit\Backoffice\Employees\Domain\Models\Employee;

class StoreEmployeeAction
{
    /**
     * @param array<string, mixed> $data
     */
    public function __invoke(array $data): Employee
    {
        return Employee::create($data);
    }
}
