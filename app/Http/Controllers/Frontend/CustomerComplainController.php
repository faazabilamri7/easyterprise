<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCustomerComplainRequest;
use App\Http\Requests\StoreCustomerComplainRequest;
use App\Http\Requests\UpdateCustomerComplainRequest;
use App\Models\CustomerComplain;
use App\Models\SalesOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerComplainController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('customer_complain_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerComplains = CustomerComplain::with(['sales_order'])->get();

        return view('frontend.customerComplains.index', compact('customerComplains'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_complain_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.customerComplains.create', compact('sales_orders'));
    }

    public function store(StoreCustomerComplainRequest $request)
    {
        $customerComplain = CustomerComplain::create($request->all());

        return redirect()->route('frontend.customer-complains.index');
    }

    public function edit(CustomerComplain $customerComplain)
    {
        abort_if(Gate::denies('customer_complain_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customerComplain->load('sales_order');

        return view('frontend.customerComplains.edit', compact('customerComplain', 'sales_orders'));
    }

    public function update(UpdateCustomerComplainRequest $request, CustomerComplain $customerComplain)
    {
        $customerComplain->update($request->all());

        return redirect()->route('frontend.customer-complains.index');
    }

    public function show(CustomerComplain $customerComplain)
    {
        abort_if(Gate::denies('customer_complain_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerComplain->load('sales_order');

        return view('frontend.customerComplains.show', compact('customerComplain'));
    }

    public function destroy(CustomerComplain $customerComplain)
    {
        abort_if(Gate::denies('customer_complain_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerComplain->delete();

        return back();
    }

    public function massDestroy(MassDestroyCustomerComplainRequest $request)
    {
        CustomerComplain::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
