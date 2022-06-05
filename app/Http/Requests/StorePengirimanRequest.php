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
            'nama_customer' => [
                'string',
                'nullable',
            ],
        ];
    }
}
