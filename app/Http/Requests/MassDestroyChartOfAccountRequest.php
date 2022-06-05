<?php

namespace App\Http\Requests;

use App\Models\ChartOfAccount;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyChartOfAccountRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('chart_of_account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:chart_of_accounts,id',
        ];
    }
}
