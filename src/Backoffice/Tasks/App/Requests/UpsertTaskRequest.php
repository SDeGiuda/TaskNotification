<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['integer', 'nullable', 'exists:tasks,id'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:5000', 'string'],
            'employee_id' => ['required', 'exists:employees,id'],
            'status' => ['required', 'Rule::enum(Status::class)'],
        ];
    }
}
