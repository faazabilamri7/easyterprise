<?php

namespace App\Http\Requests;

use App\Models\FaqCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateFaqCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('faq_category_edit');
    }

    public function rules()
    {
        return [
            'category' => [
                'string',
                'required',
            ],
        ];
    }
}
