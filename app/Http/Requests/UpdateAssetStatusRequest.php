<?php

namespace App\Http\Requests;

use App\Models\AssetStatus;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_status_edit');
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
