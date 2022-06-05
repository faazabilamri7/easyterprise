<?php

namespace App\Http\Requests;

use App\Models\ChartOfAccount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreChartOfAccountRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('chart_of_account_create');
    }

    public function rules()
    {
        return [
            'account_code' => [
                'string',
                'required',
            ],
            'account_name' => [
                'string',
                'required',
            ],
            'category' => [
                'required',
            ],
        ];
    }
}
