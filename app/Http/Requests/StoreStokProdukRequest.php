<?php

namespace App\Http\Requests;

use App\Models\StokProduk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStokProdukRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stok_produk_create');
    }

    public function rules()
    {
        return [
            'nama_produk' => [
                'string',
                'nullable',
            ],
            'qty' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sku' => [
                'string',
                'nullable',
            ],
        ];
    }
}
