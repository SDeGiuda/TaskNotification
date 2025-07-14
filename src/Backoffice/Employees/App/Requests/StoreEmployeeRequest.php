<?php

declare(strict_types=1);

namespace Lightit\Backoffice\Employees\App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => ['required', 'email:strict'],
        ];
    }
}
