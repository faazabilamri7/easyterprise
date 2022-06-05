<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurchaseReturnRequest;
use App\Http\Requests\StorePurchaseReturnRequest;
use App\Http\Requests\UpdatePurchaseReturnRequest;
use App\Models\PurchaseOrder;
use App\Models\PurchaseReturn;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchaseReturnController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purchase_return_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseReturns = PurchaseReturn::with(['id_order'])->get();

        return view('admin.purchaseReturns.index', compact('purchaseReturns'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_return_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_orders = PurchaseOrder::pluck('material_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseReturns.create', compact('id_orders'));
    }

    public function store(StorePurchaseReturnRequest $request)
    {
        $purchaseReturn = PurchaseReturn::create($request->all());

        return redirect()->route('admin.purchase-returns.index');
    }

    public function edit(PurchaseReturn $purchaseReturn)
    {
        abort_if(Gate::denies('purchase_return_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_orders = PurchaseOrder::pluck('material_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseReturn->load('id_order');

        return view('admin.purchaseReturns.edit', compact('id_orders', 'purchaseReturn'));
    }

    public function update(UpdatePurchaseReturnRequest $request, PurchaseReturn $purchaseReturn)
    {
        $purchaseReturn->update($request->all());

        return redirect()->route('admin.purchase-returns.index');
    }

    public function show(PurchaseReturn $purchaseReturn)
    {
        abort_if(Gate::denies('purchase_return_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseReturn->load('id_order');

        return view('admin.purchaseReturns.show', compact('purchaseReturn'));
    }

    public function destroy(PurchaseReturn $purchaseReturn)
    {
        abort_if(Gate::denies('purchase_return_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseReturn->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseReturnRequest $request)
    {
        PurchaseReturn::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
