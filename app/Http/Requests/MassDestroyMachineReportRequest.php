<?php

namespace App\Http\Requests;

use App\Models\MachineReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyMachineReportRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('machine_report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:machine_reports,id',
        ];
    }
}
