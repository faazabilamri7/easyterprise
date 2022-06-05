<?php

namespace App\Http\Requests;

use App\Models\InvoicePembelian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInvoicePembelianRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_pembelian_edit');
    }

    public function rules()
    {
        return [
            'nomor' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tanggal' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
