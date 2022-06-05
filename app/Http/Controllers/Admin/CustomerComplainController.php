<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCustomerComplainRequest;
use App\Http\Requests\StoreCustomerComplainRequest;
use App\Http\Requests\UpdateCustomerComplainRequest;
use App\Models\CrmCustomer;
use App\Models\CustomerComplain;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerComplainController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('customer_complain_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerComplains = CustomerComplain::with(['id_customer'])->get();

        return view('admin.customerComplains.index', compact('customerComplains'));
    }

    public function create()
    {
        abort_if(Gate::denies('customer_complain_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.customerComplains.create', compact('id_customers'));
    }

    public function store(StoreCustomerComplainRequest $request)
    {
        $customerComplain = CustomerComplain::create($request->all());

        return redirect()->route('admin.customer-complains.index');
    }

    public function edit(CustomerComplain $customerComplain)
    {
        abort_if(Gate::denies('customer_complain_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customerComplain->load('id_customer');

        return view('admin.customerComplains.edit', compact('customerComplain', 'id_customers'));
    }

    public function update(UpdateCustomerComplainRequest $request, CustomerComplain $customerComplain)
    {
        $customerComplain->update($request->all());

        return redirect()->route('admin.customer-complains.index');
    }

    public function show(CustomerComplain $customerComplain)
    {
        abort_if(Gate::denies('customer_complain_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customerComplain->load('id_customer');

        return view('admin.customerComplains.show', compact('customerComplain'));
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
