<?php

namespace App\Http\Requests;

use App\Models\Material;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMaterialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('material_edit');
    }

    public function rules()
    {
        return [
            'name_material' => [
                'string',
                'required',
            ],
            'photo' => [
                'array',
            ],
            'stock' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
