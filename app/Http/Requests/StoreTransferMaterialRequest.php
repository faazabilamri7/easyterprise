<?php

namespace App\Http\Requests;

use App\Models\TransferMaterial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransferMaterialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transfer_material_create');
    }

    public function rules()
    {
        return [
            'id_transfer_material' => [
                'string',
                'required',
            ],
            'id_list_of_material_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
