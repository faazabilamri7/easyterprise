<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySalesInvoiceRequest;
use App\Http\Requests\StoreSalesInvoiceRequest;
use App\Http\Requests\UpdateSalesInvoiceRequest;
use App\Models\SalesInvoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SalesInvoiceController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sales_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SalesInvoice::query()->select(sprintf('%s.*', (new SalesInvoice())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sales_invoice_show';
                $editGate = 'sales_invoice_edit';
                $deleteGate = 'sales_invoice_delete';
                $crudRoutePart = 'sales-invoices';

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

        return view('admin.salesInvoices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sales_invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.salesInvoices.create');
    }

    public function store(StoreSalesInvoiceRequest $request)
    {
        $salesInvoice = SalesInvoice::create($request->all());

        return redirect()->route('admin.sales-invoices.index');
    }

    public function edit(SalesInvoice $salesInvoice)
    {
        abort_if(Gate::denies('sales_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.salesInvoices.edit', compact('salesInvoice'));
    }

    public function update(UpdateSalesInvoiceRequest $request, SalesInvoice $salesInvoice)
    {
        $salesInvoice->update($request->all());

        return redirect()->route('admin.sales-invoices.index');
    }

    public function show(SalesInvoice $salesInvoice)
    {
        abort_if(Gate::denies('sales_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.salesInvoices.show', compact('salesInvoice'));
    }

    public function destroy(SalesInvoice $salesInvoice)
    {
        abort_if(Gate::denies('sales_invoice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInvoice->delete();

        return back();
    }

    public function massDestroy(MassDestroySalesInvoiceRequest $request)
    {
        SalesInvoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
