<?php

namespace App\Http\Requests;

use App\Models\SalesOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalesOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sales_order_create');
    }

    public function rules()
    {
        return [
            'no_sales_order' => [
                'string',
                'nullable',
            ],
            'tanggal' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'detail_order' => [
                'string',
                'nullable',
            ],
        ];
    }
}
