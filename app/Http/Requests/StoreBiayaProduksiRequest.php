<?php

namespace App\Http\Requests;

use App\Models\BiayaProduksi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBiayaProduksiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('biaya_produksi_create');
    }

    public function rules()
    {
        return [
            'tanggal' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'periode' => [
                'string',
                'nullable',
            ],
            'desc' => [
                'string',
                'nullable',
            ],
        ];
    }
}
