<?php

namespace App\Http\Requests;

use App\Models\QualityControl;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreQualityControlRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quality_control_create');
    }

    public function rules()
    {
        return [];
    }
}
