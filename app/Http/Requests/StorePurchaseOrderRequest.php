<?php

namespace App\Http\Requests;

use App\Models\PurchaseOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePurchaseOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_order_create');
    }

    public function rules()
    {
        return [
            'id_purchase_order' => [
                'string',
                'required',
            ],
            'id_purchase_quotation_id' => [
                'required',
                'integer',
            ],
            'date_purchase_order' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
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
        ];
    }
}
