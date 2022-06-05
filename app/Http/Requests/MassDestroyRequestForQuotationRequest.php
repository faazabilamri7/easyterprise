<?php

namespace App\Http\Requests;

use App\Models\RequestForQuotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRequestForQuotationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('request_for_quotation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:request_for_quotations,id',
        ];
    }
}
