<?php

namespace App\Http\Requests;

use App\Models\ProductionMonitoring;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductionMonitoringRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('production_monitoring_edit');
    }

    public function rules()
    {
        return [
            'production_plan_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
