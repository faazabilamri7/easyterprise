<?php

namespace App\Http\Requests;

use App\Models\MachineReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMachineReportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('machine_report_edit');
    }

    public function rules()
    {
        return [
            'id_mesin' => [
                'string',
                'nullable',
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
