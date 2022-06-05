<?php

namespace App\Http\Requests;

use App\Models\SalesOrder;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalesOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sales_order_edit');
    }

    public function rules()
    {
        return [
            'customer_id' => [
                'required',
                'integer',
            ],
            'sales_quotation_id' => [
                'required',
                'integer',
            ],
            'qty' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'detail_order' => [
                'string',
                'nullable',
            ],
            'tanggal' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
