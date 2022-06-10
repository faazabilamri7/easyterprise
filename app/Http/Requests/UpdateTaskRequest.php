<?php

namespace App\Http\Requests;

use App\Models\Task;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTaskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('task_edit');
    }

    public function rules()
    {
        return [
            'id_production_plan' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'required',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ],
            'due_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
