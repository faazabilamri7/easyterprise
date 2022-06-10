<?php

namespace App\Http\Requests;

use App\Models\MaterialEntry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMaterialEntryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('material_entry_edit');
    }

    public function rules()
    {
        return [
            'id_material_entry' => [
                'string',
                'nullable',
            ],
            'date_material_entry' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'material_name' => [
                'string',
                'nullable',
            ],
            'qty' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
