<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class PurchaseOrderController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PurchaseOrder::with(['id_purchase_quotation', 'material_name'])->select(sprintf('%s.*', (new PurchaseOrder())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'purchase_order_show';
                $editGate = 'purchase_order_edit';
                $deleteGate = 'purchase_order_delete';
                $crudRoutePart = 'purchase-orders';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_purchase_order', function ($row) {
                return $row->id_purchase_order ? $row->id_purchase_order : '';
            });
            $table->addColumn('id_purchase_quotation_id_purchase_quotation', function ($row) {
                return $row->id_purchase_quotation ? $row->id_purchase_quotation->id_purchase_quotation : '';
            });

            $table->addColumn('material_name_name_material', function ($row) {
                return $row->material_name ? $row->material_name->name_material : '';
            });

            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_purchase_quotation', 'material_name']);

            return $table->make(true);
        }

        return view('admin.purchaseOrders.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_quotations = PurchaseQuotation::pluck('id_purchase_quotation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_names = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseOrders.create', compact('id_purchase_quotations', 'material_names'));
    }

    public function store(StorePurchaseOrderRequest $request)
    {
        $purchaseOrder = PurchaseOrder::create($request->all());

        return redirect()->route('admin.purchase-orders.index');
    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        abort_if(Gate::denies('purchase_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_quotations = PurchaseQuotation::pluck('id_purchase_quotation', 'id')->prepend(trans('global.pleaseSelect'), '');

        $material_names = Material::pluck('name_material', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseOrder->load('id_purchase_quotation', 'material_name');

        return view('admin.purchaseOrders.edit', compact('id_purchase_quotations', 'material_names', 'purchaseOrder'));
    }

    public function update(UpdatePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->update($request->all());

        return redirect()->route('admin.purchase-orders.index');
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        abort_if(Gate::denies('purchase_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseOrder->load('id_purchase_quotation', 'material_name', 'idPurchaseOrderMaterialEntries', 'idPurchaseOrderPurchaseReturns');

        return view('admin.purchaseOrders.show', compact('purchaseOrder'));
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
