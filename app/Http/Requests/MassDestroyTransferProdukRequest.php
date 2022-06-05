<?php

namespace App\Http\Requests;

use App\Models\TransferProduk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTransferProdukRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('transfer_produk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:transfer_produks,id',
        ];
    }
}
