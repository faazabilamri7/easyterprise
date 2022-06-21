<?php

namespace App\Http\Requests;

use App\Models\SalesInvoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalesInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sales_invoice_edit');
    }

    public function rules()
    {
        return [
            'no_sales_invoice' => [
                'string',
                'nullable',
            ],
            'tanggal' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'jatuh_tempo' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
