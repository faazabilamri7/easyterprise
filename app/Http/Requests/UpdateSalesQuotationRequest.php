<?php

namespace App\Http\Requests;

use App\Models\SalesQuotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalesQuotationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sales_quotation_edit');
    }

    public function rules()
    {
        return [
            'kode_inquiry_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
