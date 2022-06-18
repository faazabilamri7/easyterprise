<?php

namespace App\Http\Requests;

use App\Models\RequestForQuotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequestForQuotationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('request_for_quotation_create');
    }

    public function rules()
    {
        return [
            'id_request_for_quotation' => [
                'string',
                'required',
            ],
            'id_purchase_requisition_id' => [
                'required',
                'integer',
            ],
            'material_name' => [
                'string',
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
