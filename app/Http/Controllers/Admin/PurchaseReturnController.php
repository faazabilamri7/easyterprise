<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPurchaseReturnRequest;
use App\Http\Requests\StorePurchaseReturnRequest;
use App\Http\Requests\UpdatePurchaseReturnRequest;
use App\Models\PurchaseOrder;
use App\Models\PurchaseReturn;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchaseReturnController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_return_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PurchaseReturn::with(['id_purchase_order'])->select(sprintf('%s.*', (new PurchaseReturn())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'purchase_return_show';
                $editGate = 'purchase_return_edit';
                $deleteGate = 'purchase_return_delete';
                $crudRoutePart = 'purchase-returns';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('purchase_return', function ($row) {
                return $row->purchase_return ? $row->purchase_return : '';
            });
            $table->addColumn('id_purchase_order_id_purchase_order', function ($row) {
                return $row->id_purchase_order ? $row->id_purchase_order->id_purchase_order : '';
            });

            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->editColumn('status', function ($row) {
                return $row->status ? PurchaseReturn::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_purchase_order']);

            return $table->make(true);
        }

        return view('admin.purchaseReturns.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_return_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_orders = PurchaseOrder::pluck('id_purchase_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseReturns.create', compact('id_purchase_orders'));
    }

    public function store(StorePurchaseReturnRequest $request)
    {
        $purchaseReturn = PurchaseReturn::create($request->all());

        return redirect()->route('admin.purchase-returns.index');
    }

    public function edit(PurchaseReturn $purchaseReturn)
    {
        abort_if(Gate::denies('purchase_return_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_purchase_orders = PurchaseOrder::pluck('id_purchase_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseReturn->load('id_purchase_order');

        return view('admin.purchaseReturns.edit', compact('id_purchase_orders', 'purchaseReturn'));
    }

    public function update(UpdatePurchaseReturnRequest $request, PurchaseReturn $purchaseReturn)
    {
        $purchaseReturn->update($request->all());

        return redirect()->route('admin.purchase-returns.index');
    }

    public function show(PurchaseReturn $purchaseReturn)
    {
        abort_if(Gate::denies('purchase_return_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseReturn->load('id_purchase_order');

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
