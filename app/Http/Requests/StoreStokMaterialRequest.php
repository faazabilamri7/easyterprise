<?php

namespace App\Http\Requests;

use App\Models\StokMaterial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStokMaterialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stok_material_create');
    }

    public function rules()
    {
        return [
            'nama_material' => [
                'string',
                'nullable',
            ],
            'qty' => [
                'string',
                'nullable',
            ],
        ];
    }
}
