<?php

namespace App\Http\Requests;

use App\Models\Pengiriman;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePengirimanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pengiriman_create');
    }

    public function rules()
    {
        return [
            'id_shipment' => [
                'string',
                'required',
                'unique:pengirimen',
            ],
            'no_sales_order_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
