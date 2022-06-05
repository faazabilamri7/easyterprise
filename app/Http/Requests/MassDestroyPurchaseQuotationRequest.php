<?php

namespace App\Http\Requests;

use App\Models\PurchaseQuotation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPurchaseQuotationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('purchase_quotation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:purchase_quotations,id',
        ];
    }
}
