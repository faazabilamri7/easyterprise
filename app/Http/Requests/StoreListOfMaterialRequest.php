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
            'production_plan_id' => [
                'required',
                'integer',
            ],
            'tanggal_mulai' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'tanggal_selesai' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'pilihan_bahan_baku' => [
                'string',
                'nullable',
            ],
            'qty' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'harga_satuan' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'total' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
