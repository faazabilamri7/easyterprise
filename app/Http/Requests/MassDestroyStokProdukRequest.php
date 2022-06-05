<?php

namespace App\Http\Requests;

use App\Models\StokProduk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStokProdukRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stok_produk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stok_produks,id',
        ];
    }
}
