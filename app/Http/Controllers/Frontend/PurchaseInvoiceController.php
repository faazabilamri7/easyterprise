<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPurchaseInvoiceRequest;
use App\Http\Requests\StorePurchaseInvoiceRequest;
use App\Http\Requests\UpdatePurchaseInvoiceRequest;
use App\Models\PurchaseInvoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PurchaseInvoiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('purchase_invoice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $purchaseInvoices = PurchaseInvoice::all();

        return view('frontend.purchaseInvoices.index', compact('purchaseInvoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('purchase_invoice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.purchaseInvoices.create');
    }

    public function store(StorePurchaseInvoiceRequest $request)
    {
        $purchaseInvoice = PurchaseInvoice::create($request->all());

        return redirect()->route('frontend.purchase-invoices.index');
    }

    public function edit(PurchaseInvoice $purchaseInvoice)
    {
        abort_if(Gate::denies('purchase_invoice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.purchaseInvoices.edit', compact('purchaseInvoice'));
    }

    public function update(UpdatePurchaseInvoiceRequest $request, PurchaseInvoice $purchaseInvoice)
    {
        $purchaseInvoice->update($request->all());

        return redirect()->route('frontend.purchase-invoices.index');
    }

    public function show(PurchaseInvoice $purchaseInvoice)
    {
        abort_if(Gate::denies('purchase_invoice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.purchaseInvoices.show', compact('purchaseInvoice'));
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
