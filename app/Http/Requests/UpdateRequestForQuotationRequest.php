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
            'id_request_for_quotation' => [
                'string',
                'required',
            ],
            'id_purchase_requisition_id' => [
                'required',
                'integer',
            ],
            'material_name_id' => [
                'required',
                'integer',
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
