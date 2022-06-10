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
                'nullable',
            ],
        ];
    }
}
