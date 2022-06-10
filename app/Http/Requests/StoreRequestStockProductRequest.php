<?php

namespace App\Http\Requests;

use App\Models\RequestStockProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRequestStockProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('request_stock_product_create');
    }

    public function rules()
    {
        return [
            'id_request_product' => [
                'string',
                'nullable',
            ],
            'tanggal_request' => [
                'date_format:' . config('panel.date_format'),
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
