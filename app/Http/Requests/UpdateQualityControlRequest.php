<?php

namespace App\Http\Requests;

use App\Models\QualityControl;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateQualityControlRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('quality_control_edit');
    }

    public function rules()
    {
        return [
            'id_quality_control' => [
                'string',
                'required',
            ],
            'id_production_monitoring_id' => [
                'required',
                'integer',
            ],
            'qty' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'qty_failed' => [
                'string',
                'nullable',
            ],
        ];
    }
}
