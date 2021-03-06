<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPurchaseOrderRequest;
use App\Http\Requests\StorePurchaseOrderRequest;
use App\Http\Requests\UpdatePurchaseOrderRequest;
use App\Models\Material;
use App\Models\PurchaseOrder;
use App\Models\PurchaseQuotation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchaseOrderController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('purchase_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseOrders = PurchaseOrder::with(['id_purchase_quotation', 'material_name'])->get();

        return view('frontend.purchaseOrders.index', compact('purchaseOrders'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_quotations = PurchaseQuotation::pluck('id_purchase_quotation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_names = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.purchaseOrders.create', compact('id_purchase_quotations', 'material_names'));
    }

    public function store(StorePurchaseOrderRequest $request)
    {
        $purchaseOrder = PurchaseOrder::create($request->all());

        return redirect()->route('frontend.purchase-orders.index');
    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        abort_if(Gate::denies('purchase_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_quotations = PurchaseQuotation::pluck('id_purchase_quotation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_names = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseOrder->load('id_purchase_quotation', 'material_name');

        return view('frontend.purchaseOrders.edit', compact('id_purchase_quotations', 'material_names', 'purchaseOrder'));
    }

    public function update(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->update($request->all());

        return redirect()->route('frontend.purchase-orders.index');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        abort_if(Gate::denies('purchase_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseOrder->load('id_purchase_quotation', 'material_name', 'idPurchaseOrderMaterialEntries', 'idPurchaseOrderPurchaseReturns');

        return view('frontend.purchaseOrders.show', compact('purchaseOrder'));
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        abort_if(Gate::denies('purchase_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseOrderRequest $request)
    {
        PurchaseOrder::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
