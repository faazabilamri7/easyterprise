<?php

namespace App\Http\Requests;

use App\Models\PurchaseRequition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPurchaseRequitionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('purchase_requition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:purchase_requitions,id',
        ];
    }
}
