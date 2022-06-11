<?php

namespace App\Http\Requests;

use App\Models\RequestStockProduct;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRequestStockProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('request_stock_product_edit');
    }

    public function rules()
    {
        return [
            'id_request_product' => [
                'string',
                'required',
            ],
            'inquiry_id' => [
                'required',
                'integer',
            ],
            'tanggal_request' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'request_product_id' => [
                'required',
                'integer',
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
