<?php

namespace App\Http\Requests;

use App\Models\PurchaseInq;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePurchaseInqRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_inq_edit');
    }

    public function rules()
    {
        return [
            'id_purchase_inquiry' => [
                'string',
                'required',
            ],
            'id_request_for_quotation_id' => [
                'required',
                'integer',
            ],
            'vendor_name_id' => [
                'required',
                'integer',
            ],
            'date_puchase_inquiry' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'qty' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
