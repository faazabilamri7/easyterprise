<?php

namespace App\Http\Requests;

use App\Models\KasBank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKasBankRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kas_bank_edit');
    }

    public function rules()
    {
        return [
            'tanggal' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'reff' => [
                'string',
                'nullable',
            ],
            'jumlah' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
