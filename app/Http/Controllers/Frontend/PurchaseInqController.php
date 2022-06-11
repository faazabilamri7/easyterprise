<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPurchaseInqRequest;
use App\Http\Requests\StorePurchaseInqRequest;
use App\Http\Requests\UpdatePurchaseInqRequest;
use App\Models\Material;
use App\Models\PurchaseInq;
use App\Models\RequestForQuotation;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchaseInqController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('purchase_inq_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseInqs = PurchaseInq::with(['id_request_for_quotation', 'vendor_name', 'name_material'])->get();

        return view('frontend.purchaseInqs.index', compact('purchaseInqs'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_inq_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_request_for_quotations = RequestForQuotation::pluck('id_request_for_quotation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vendor_names = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $name_materials = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.purchaseInqs.create', compact('id_request_for_quotations', 'name_materials', 'vendor_names'));
    }

    public function store(StorePurchaseInqRequest $request)
    {
        $purchaseInq = PurchaseInq::create($request->all());

        return redirect()->route('frontend.purchase-inqs.index');
    }

    public function edit(PurchaseInq $purchaseInq)
    {
        abort_if(Gate::denies('purchase_inq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_request_for_quotations = RequestForQuotation::pluck('id_request_for_quotation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vendor_names = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $name_materials = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseInq->load('id_request_for_quotation', 'vendor_name', 'name_material');

        return view('frontend.purchaseInqs.edit', compact('id_request_for_quotations', 'name_materials', 'purchaseInq', 'vendor_names'));
    }

    public function update(UpdatePurchaseInqRequest $request, PurchaseInq $purchaseInq)
    {
        $purchaseInq->update($request->all());

        return redirect()->route('frontend.purchase-inqs.index');
    }

    public function show(PurchaseInq $purchaseInq)
    {
        abort_if(Gate::denies('purchase_inq_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseInq->load('id_request_for_quotation', 'vendor_name', 'name_material');

        return view('frontend.purchaseInqs.show', compact('purchaseInq'));
    }

    public function destroy(PurchaseInq $purchaseInq)
    {
        abort_if(Gate::denies('purchase_inq_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseInq->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseInqRequest $request)
    {
        PurchaseInq::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
