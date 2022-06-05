<?php

namespace App\Http\Requests;

use App\Models\ProductionPlan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductionPlanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('production_plan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:production_plans,id',
        ];
    }
}
