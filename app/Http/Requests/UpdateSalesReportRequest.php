<?php

namespace App\Http\Requests;

use App\Models\SalesReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSalesReportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sales_report_edit');
    }

    public function rules()
    {
        return [
            'tanggal_laporan' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
