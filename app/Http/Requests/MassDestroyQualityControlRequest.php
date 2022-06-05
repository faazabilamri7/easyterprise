<?php

namespace App\Http\Requests;

use App\Models\QualityControl;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyQualityControlRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('quality_control_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:quality_controls,id',
        ];
    }
}
