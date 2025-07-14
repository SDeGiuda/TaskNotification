<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Tasks\App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpsertTaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => [ 'integer', 'exists:tasks,id'],
            'title' => 'required',
            'description' => 'required',
            'employee_id' => ['required', 'exists:employees,id'],
            'status'=> ['required'],
        ];
    }
}
