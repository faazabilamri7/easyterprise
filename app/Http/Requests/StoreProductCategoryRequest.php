<?php

namespace App\Http\Requests;

use App\Models\ProductCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_category_create');
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
