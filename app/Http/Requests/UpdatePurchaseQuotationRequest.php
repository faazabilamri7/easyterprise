<?php

namespace App\Http\Requests;

use App\Models\PurchaseQuotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePurchaseQuotationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_quotation_edit');
    }

    public function rules()
    {
        return [
            'id_purchase_quotation' => [
                'string',
                'required',
            ],
            'id_purchase_inquiry_id' => [
                'required',
                'integer',
            ],
            'id_vendor_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
