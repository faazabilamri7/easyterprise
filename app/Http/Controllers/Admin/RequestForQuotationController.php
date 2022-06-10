<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRequestForQuotationRequest;
use App\Http\Requests\StoreRequestForQuotationRequest;
use App\Http\Requests\UpdateRequestForQuotationRequest;
use App\Models\PurchaseRequition;
use App\Models\RequestForQuotation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequestForQuotationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('request_for_quotation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestForQuotations = RequestForQuotation::with(['id_purchase_requisition'])->get();

        return view('admin.requestForQuotations.index', compact('requestForQuotations'));
    }

    public function create()
    {
        abort_if(Gate::denies('request_for_quotation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_requisitions = PurchaseRequition::pluck('id_purchase_requition', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.requestForQuotations.create', compact('id_purchase_requisitions'));
    }

    public function store(StoreRequestForQuotationRequest $request)
    {
        $requestForQuotation = RequestForQuotation::create($request->all());

        return redirect()->route('admin.request-for-quotations.index');
    }

    public function edit(RequestForQuotation $requestForQuotation)
    {
        abort_if(Gate::denies('request_for_quotation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_requisitions = PurchaseRequition::pluck('id_purchase_requition', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requestForQuotation->load('id_purchase_requisition');

        return view('admin.requestForQuotations.edit', compact('id_purchase_requisitions', 'requestForQuotation'));
    }

    public function update(UpdateRequestForQuotationRequest $request, RequestForQuotation $requestForQuotation)
    {
        $requestForQuotation->update($request->all());

        return redirect()->route('admin.request-for-quotations.index');
    }

    public function show(RequestForQuotation $requestForQuotation)
    {
        abort_if(Gate::denies('request_for_quotation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestForQuotation->load('id_purchase_requisition', 'idRequestForQuotationPurchaseInqs');

        return view('admin.requestForQuotations.show', compact('requestForQuotation'));
    }

    public function destroy(RequestForQuotation $requestForQuotation)
    {
        abort_if(Gate::denies('request_for_quotation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requestForQuotation->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequestForQuotationRequest $request)
    {
        RequestForQuotation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
