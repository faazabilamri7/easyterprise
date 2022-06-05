<?php

namespace App\Http\Requests;

use App\Models\CustomerComplain;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCustomerComplainRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('customer_complain_edit');
    }

    public function rules()
    {
        return [];
    }
}
