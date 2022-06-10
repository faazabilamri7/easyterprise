<?php

namespace App\Http\Requests;

use App\Models\PurchaseQuotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePurchaseQuotationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_quotation_create');
    }

    public function rules()
    {
        return [
            'id_purchase_quotation' => [
                'string',
                'nullable',
            ],
        ];
    }
}
