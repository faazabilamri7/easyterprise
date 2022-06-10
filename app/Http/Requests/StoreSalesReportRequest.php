<?php

namespace App\Http\Requests;

use App\Models\SalesReport;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSalesReportRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sales_report_create');
    }

    public function rules()
    {
        return [];
    }
}
