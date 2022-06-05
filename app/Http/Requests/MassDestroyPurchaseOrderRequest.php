<?php

namespace App\Http\Requests;

use App\Models\PurchaseOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPurchaseOrderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('purchase_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:purchase_orders,id',
        ];
    }
}
