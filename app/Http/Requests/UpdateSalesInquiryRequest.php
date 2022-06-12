<?php

namespace App\Http\Requests;

use App\Models\SalesInquiry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalesInquiryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sales_inquiry_edit');
    }

    public function rules()
    {
        return [
            'inquiry_kode' => [
                'string',
                'required',
            ],
            'tgl_inquiry' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'id_customer_id' => [
                'required',
                'integer',
            ],
            'nama_produk_id' => [
                'required',
                'integer',
            ],
            'qty' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
