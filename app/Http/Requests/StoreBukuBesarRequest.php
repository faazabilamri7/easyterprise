<?php

namespace App\Http\Requests;

use App\Models\BukuBesar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBukuBesarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('buku_besar_create');
    }

    public function rules()
    {
        return [
            'tanggal' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'keterangan' => [
                'string',
                'nullable',
            ],
            'status' => [
                'string',
                'nullable',
            ],
        ];
    }
}
