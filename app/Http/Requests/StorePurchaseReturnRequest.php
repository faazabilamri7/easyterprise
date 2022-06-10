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
            'purchase_return' => [
                'string',
                'nullable',
            ],
            'date_purchase_return' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
