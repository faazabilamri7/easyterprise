<?php

namespace App\Http\Requests;

use App\Models\ProductionMonitoring;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductionMonitoringRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('production_monitoring_create');
    }

    public function rules()
    {
        return [
            'id_production_monitoring' => [
                'string',
                'nullable',
            ],
        ];
    }
}
