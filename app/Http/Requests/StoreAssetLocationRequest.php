<?php

namespace App\Http\Requests;

use App\Models\AssetLocation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAssetLocationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_location_create');
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
