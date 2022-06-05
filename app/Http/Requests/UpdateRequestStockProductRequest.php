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
            'tanggal_request' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
