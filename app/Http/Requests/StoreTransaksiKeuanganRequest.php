<?php

namespace App\Http\Requests;

use App\Models\TransaksiKeuangan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTransaksiKeuanganRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transaksi_keuangan_create');
    }

    public function rules()
    {
        return [
            'kas_bank_id' => [
                'required',
                'integer',
            ],
            'tanggal' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'desc' => [
                'string',
                'nullable',
            ],
            'jenis_pembayaran' => [
                'string',
                'nullable',
            ],
            'qty' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sales_product_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
