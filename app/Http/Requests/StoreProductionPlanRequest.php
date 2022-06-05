<?php

namespace App\Http\Requests;

use App\Models\ProductionPlan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductionPlanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('production_plan_create');
    }

    public function rules()
    {
        return [
            'tugas' => [
                'string',
                'required',
            ],
            'tanggal_mulai' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'durasi' => [
                'string',
                'required',
            ],
            'rincian' => [
                'string',
                'nullable',
            ],
        ];
    }
}
