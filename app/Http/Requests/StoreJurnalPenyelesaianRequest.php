<?php

namespace App\Http\Requests;

use App\Models\JurnalPenyelesaian;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJurnalPenyelesaianRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jurnal_penyelesaian_create');
    }

    public function rules()
    {
        return [
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
