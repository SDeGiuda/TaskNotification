<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Lightit\Backoffice\Employees\Domain\Models\Employee;

/** @mixin Employee */
class EmployeesResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
