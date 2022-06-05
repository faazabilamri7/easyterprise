<?php

namespace App\Http\Requests;

use App\Models\VendorStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateVendorStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('vendor_status_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
