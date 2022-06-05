<?php

namespace App\Http\Requests;

use App\Models\ProductionMonitoring;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyProductionMonitoringRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('production_monitoring_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:production_monitorings,id',
        ];
    }
}
