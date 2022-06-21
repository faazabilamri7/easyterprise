<?php

namespace App\Http\Requests;

use App\Models\SalesInvoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalesInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sales_invoice_create');
    }

    public function rules()
    {
        return [
            'no_sales_invoice' => [
                'string',
                'nullable',
            ],
            'jatuh_tempo' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
