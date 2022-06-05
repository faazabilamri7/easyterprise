<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvoicePembelianRequest;
use App\Http\Requests\StoreInvoicePembelianRequest;
use App\Http\Requests\UpdateInvoicePembelianRequest;
use App\Models\CrmCustomer;
use App\Models\InvoicePembelian;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoicePembelianController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('invoice_pembelian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoicePembelians = InvoicePembelian::with(['perusahaan', 'customer'])->get();

        return view('frontend.invoicePembelians.index', compact('invoicePembelians'));
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_pembelian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.invoicePembelians.create', compact('customers', 'perusahaans'));
    }

    public function store(StoreInvoicePembelianRequest $request)
    {
        $invoicePembelian = InvoicePembelian::create($request->all());

        return redirect()->route('frontend.invoice-pembelians.index');
    }

    public function edit(InvoicePembelian $invoicePembelian)
    {
        abort_if(Gate::denies('invoice_pembelian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoicePembelian->load('perusahaan', 'customer');

        return view('frontend.invoicePembelians.edit', compact('customers', 'invoicePembelian', 'perusahaans'));
    }

    public function update(UpdateInvoicePembelianRequest $request, InvoicePembelian $invoicePembelian)
    {
        $invoicePembelian->update($request->all());

        return redirect()->route('frontend.invoice-pembelians.index');
    }

    public function show(InvoicePembelian $invoicePembelian)
    {
        abort_if(Gate::denies('invoice_pembelian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoicePembelian->load('perusahaan', 'customer');

        return view('frontend.invoicePembelians.show', compact('invoicePembelian'));
    }

    public function destroy(InvoicePembelian $invoicePembelian)
    {
        abort_if(Gate::denies('invoice_pembelian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoicePembelian->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvoicePembelianRequest $request)
    {
        InvoicePembelian::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
