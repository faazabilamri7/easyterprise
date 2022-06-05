<?php

namespace App\Http\Requests;

use App\Models\MachineReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMachineReportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('machine_report_create');
    }

    public function rules()
    {
        return [
            'production_plan_id' => [
                'required',
                'integer',
            ],
            'nama_mesin' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
