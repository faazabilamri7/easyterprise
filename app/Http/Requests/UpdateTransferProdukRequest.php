<?php

namespace App\Http\Requests;

use App\Models\TransferProduk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransferProdukRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transfer_produk_edit');
    }

    public function rules()
    {
        return [
            'id_transfer_produk' => [
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
