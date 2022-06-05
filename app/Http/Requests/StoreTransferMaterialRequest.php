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
            'tanggal_transaksi' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
