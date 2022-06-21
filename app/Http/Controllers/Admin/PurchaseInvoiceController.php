<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPurchaseInvoiceRequest;
use App\Http\Requests\StorePurchaseInvoiceRequest;
use App\Http\Requests\UpdatePurchaseInvoiceRequest;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PurchaseInvoiceController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('purchase_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PurchaseInvoice::with(['purchase_order'])->select(sprintf('%s.*', (new PurchaseInvoice())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'purchase_invoice_show';
                $editGate = 'purchase_invoice_edit';
                $deleteGate = 'purchase_invoice_delete';
                $crudRoutePart = 'purchase-invoices';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('no_purchase_invoice', function ($row) {
                return $row->no_purchase_invoice ? $row->no_purchase_invoice : '';
            });

            $table->addColumn('purchase_order_date_purchase_order', function ($row) {
                return $row->purchase_order ? $row->purchase_order->date_purchase_order : '';
            });

            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? PurchaseInvoice::STATUS_RADIO[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'purchase_order']);

            return $table->make(true);
        }

        return view('admin.purchaseInvoices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase_orders = PurchaseOrder::pluck('date_purchase_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.purchaseInvoices.create', compact('purchase_orders'));
    }

    public function store(StorePurchaseInvoiceRequest $request)
    {
        $purchaseInvoice = PurchaseInvoice::create($request->all());

        return redirect()->route('admin.purchase-invoices.index');
    }

    public function edit(PurchaseInvoice $purchaseInvoice)
    {
        abort_if(Gate::denies('purchase_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchase_orders = PurchaseOrder::pluck('date_purchase_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $purchaseInvoice->load('purchase_order');

        return view('admin.purchaseInvoices.edit', compact('purchaseInvoice', 'purchase_orders'));
    }

    public function update(UpdatePurchaseInvoiceRequest $request, PurchaseInvoice $purchaseInvoice)
    {
        $purchaseInvoice->update($request->all());

        return redirect()->route('admin.purchase-invoices.index');
    }

    public function show(PurchaseInvoice $purchaseInvoice)
    {
        abort_if(Gate::denies('purchase_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseInvoice->load('purchase_order');

        return view('admin.purchaseInvoices.show', compact('purchaseInvoice'));
    }

    public function destroy(PurchaseInvoice $purchaseInvoice)
    {
        abort_if(Gate::denies('purchase_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseInvoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyPurchaseInvoiceRequest $request)
    {
        PurchaseInvoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
