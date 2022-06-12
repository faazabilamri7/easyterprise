<?php

namespace App\Http\Requests;

use App\Models\PurchaseInvoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePurchaseInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_invoice_create');
    }

    public function rules()
    {
        return [
            'id_invoice' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
