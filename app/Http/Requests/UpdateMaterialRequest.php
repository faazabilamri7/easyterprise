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
            'price' => [
                'required',
            ],
            'photo' => [
                'array',
            ],
        ];
    }
}
