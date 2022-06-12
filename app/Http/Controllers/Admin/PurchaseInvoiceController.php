<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPurchaseInvoiceRequest;
use App\Http\Requests\StorePurchaseInvoiceRequest;
use App\Http\Requests\UpdatePurchaseInvoiceRequest;
use App\Models\PurchaseInvoice;
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
            $query = PurchaseInvoice::query()->select(sprintf('%s.*', (new PurchaseInvoice())->table));
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

            $table->editColumn('id_invoice', function ($row) {
                return $row->id_invoice ? $row->id_invoice : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.purchaseInvoices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.purchaseInvoices.create');
    }

    public function store(StorePurchaseInvoiceRequest $request)
    {
        $purchaseInvoice = PurchaseInvoice::create($request->all());

        return redirect()->route('admin.purchase-invoices.index');
    }

    public function edit(PurchaseInvoice $purchaseInvoice)
    {
        abort_if(Gate::denies('purchase_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.purchaseInvoices.edit', compact('purchaseInvoice'));
    }

    public function update(UpdatePurchaseInvoiceRequest $request, PurchaseInvoice $purchaseInvoice)
    {
        $purchaseInvoice->update($request->all());

        return redirect()->route('admin.purchase-invoices.index');
    }

    public function show(PurchaseInvoice $purchaseInvoice)
    {
        abort_if(Gate::denies('purchase_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
