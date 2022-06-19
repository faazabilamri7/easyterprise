<?php

namespace App\Http\Requests;

use App\Models\Pengiriman;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePengirimanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pengiriman_edit');
    }

    public function rules()
    {
        return [
            'id_shipment' => [
                'string',
                'required',
                'unique:pengirimen,id_shipment,' . request()->route('pengiriman')->id,
            ],
            'no_sales_order_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
