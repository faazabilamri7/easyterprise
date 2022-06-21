<?php

namespace App\Http\Requests;

use App\Models\PurchaseInvoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePurchaseInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_invoice_edit');
    }

    public function rules()
    {
        return [
            'no_purchase_invoice' => [
                'string',
                'nullable',
            ],
            'tanggal' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
