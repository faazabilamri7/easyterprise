<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySalesInvoiceRequest;
use App\Http\Requests\StoreSalesInvoiceRequest;
use App\Http\Requests\UpdateSalesInvoiceRequest;
use App\Models\SalesInvoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalesInvoiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sales_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInvoices = SalesInvoice::all();

        return view('admin.salesInvoices.index', compact('salesInvoices'));
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
