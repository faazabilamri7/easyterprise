<?php

namespace App\Http\Requests;

use App\Models\PurchaseReturn;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePurchaseReturnRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('purchase_return_create');
    }

    public function rules()
    {
        return [
            'id_purchase_return' => [
                'string',
                'nullable',
            ],
            'id_purchase_order_id' => [
                'required',
                'integer',
            ],
            'date_purchase_return' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
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
