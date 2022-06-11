<?php

namespace App\Http\Requests;

use App\Models\TransferProduk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransferProdukRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transfer_produk_create');
    }

    public function rules()
    {
        return [
            'id_transfer_produk' => [
                'string',
                'required',
            ],
            'id_quality_control_id' => [
                'required',
                'integer',
            ],
            'product_name_id' => [
                'required',
                'integer',
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
