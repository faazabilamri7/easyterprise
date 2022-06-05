<?php

namespace App\Http\Requests;

use App\Models\AssetCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssetCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asset_category_edit');
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
