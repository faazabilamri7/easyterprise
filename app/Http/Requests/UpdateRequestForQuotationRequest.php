<?php

namespace App\Http\Requests;

use App\Models\RequestForQuotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequestForQuotationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('request_for_quotation_edit');
    }

    public function rules()
    {
        return [
            'id_purchase_requisition' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'id_company' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'material_name' => [
                'string',
                'nullable',
            ],
            'quantity' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
