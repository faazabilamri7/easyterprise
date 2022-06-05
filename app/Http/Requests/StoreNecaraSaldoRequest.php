<?php

namespace App\Http\Requests;

use App\Models\NecaraSaldo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNecaraSaldoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('necara_saldo_create');
    }

    public function rules()
    {
        return [
            'tanggal' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
