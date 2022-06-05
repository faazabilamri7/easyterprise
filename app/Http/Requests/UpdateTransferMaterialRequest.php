<?php

namespace App\Http\Requests;

use App\Models\TransferMaterial;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransferMaterialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transfer_material_edit');
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
