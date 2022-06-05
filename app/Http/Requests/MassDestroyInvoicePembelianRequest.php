<?php

namespace App\Http\Requests;

use App\Models\InvoicePembelian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInvoicePembelianRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('invoice_pembelian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:invoice_pembelians,id',
        ];
    }
}
