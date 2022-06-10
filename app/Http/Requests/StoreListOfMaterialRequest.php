<?php

namespace App\Http\Requests;

use App\Models\ListOfMaterial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreListOfMaterialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('list_of_material_create');
    }

    public function rules()
    {
        return [
            'id_list_of_material' => [
                'string',
                'nullable',
            ],
            'request_air' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'request_sukrosa' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'request_dektrose' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'request_perisa_yakult' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'request_susu_bubuk_krim' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'request_polietilena_tereftalat' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
