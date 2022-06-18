<?php

namespace App\Http\Requests;

use App\Models\Vendor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVendorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vendor_edit');
    }

    public function rules()
    {
        return [
            'id_vendor' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'nama_vendor' => [
                'string',
                'required',
            ],
            'telepon' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'alamat' => [
                'string',
                'nullable',
            ],
            'website' => [
                'string',
                'nullable',
            ],
        ];
    }
}
