<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurchaseQuotationRequest;
use App\Http\Requests\StorePurchaseQuotationRequest;
use App\Http\Requests\UpdatePurchaseQuotationRequest;
use App\Models\PurchaseInq;
use App\Models\PurchaseQuotation;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchaseQuotationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purchase_quotation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseQuotations = PurchaseQuotation::with(['id_purchase_inquiry', 'id_vendor'])->get();

        return view('admin.purchaseQuotations.index', compact('purchaseQuotations'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_quotation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_inquiries = PurchaseInq::pluck('id_purchase_inquiry', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseQuotations.create', compact('id_purchase_inquiries', 'id_vendors'));
    }

    public function store(StorePurchaseQuotationRequest $request)
    {
        $purchaseQuotation = PurchaseQuotation::create($request->all());

        return redirect()->route('admin.purchase-quotations.index');
    }

    public function edit(PurchaseQuotation $purchaseQuotation)
    {
        abort_if(Gate::denies('purchase_quotation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_inquiries = PurchaseInq::pluck('id_purchase_inquiry', 'id')->prepend(trans('global.pleaseSelect'), '');

        $id_vendors = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseQuotation->load('id_purchase_inquiry', 'id_vendor');

        return view('admin.purchaseQuotations.edit', compact('id_purchase_inquiries', 'id_vendors', 'purchaseQuotation'));
    }

    public function update(UpdatePurchaseQuotationRequest $request, PurchaseQuotation $purchaseQuotation)
    {
        $purchaseQuotation->update($request->all());

        return redirect()->route('admin.purchase-quotations.index');
    }

    public function show(PurchaseQuotation $purchaseQuotation)
    {
        abort_if(Gate::denies('purchase_quotation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseQuotation->load('id_purchase_inquiry', 'id_vendor');

        return view('admin.purchaseQuotations.show', compact('purchaseQuotation'));
    }

    public function destroy(PurchaseQuotation $purchaseQuotation)
    {
        abort_if(Gate::denies('purchase_quotation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseQuotation->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseQuotationRequest $request)
    {
        PurchaseQuotation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
