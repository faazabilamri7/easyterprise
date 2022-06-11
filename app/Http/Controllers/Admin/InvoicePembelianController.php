<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyInvoicePembelianRequest;
use App\Http\Requests\StoreInvoicePembelianRequest;
use App\Http\Requests\UpdateInvoicePembelianRequest;
use App\Models\CrmCustomer;
use App\Models\InvoicePembelian;
use App\Models\Vendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InvoicePembelianController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('invoice_pembelian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = InvoicePembelian::with(['perusahaan', 'customer'])->select(sprintf('%s.*', (new InvoicePembelian())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'invoice_pembelian_show';
                $editGate = 'invoice_pembelian_edit';
                $deleteGate = 'invoice_pembelian_delete';
                $crudRoutePart = 'invoice-pembelians';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('nomor', function ($row) {
                return $row->nomor ? $row->nomor : '';
            });

            $table->addColumn('perusahaan_nama_vendor', function ($row) {
                return $row->perusahaan ? $row->perusahaan->nama_vendor : '';
            });

            $table->addColumn('customer_first_name', function ($row) {
                return $row->customer ? $row->customer->first_name : '';
            });

            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'perusahaan', 'customer']);

            return $table->make(true);
        }

        return view('admin.invoicePembelians.index');
    }

    public function create()
    {
        abort_if(Gate::denies('invoice_pembelian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.invoicePembelians.create', compact('customers', 'perusahaans'));
    }

    public function store(StoreInvoicePembelianRequest $request)
    {
        $invoicePembelian = InvoicePembelian::create($request->all());

        return redirect()->route('admin.invoice-pembelians.index');
    }

    public function edit(InvoicePembelian $invoicePembelian)
    {
        abort_if(Gate::denies('invoice_pembelian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perusahaans = Vendor::pluck('nama_vendor', 'id')->prepend(trans('global.pleaseSelect'), '');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $invoicePembelian->load('perusahaan', 'customer');

        return view('admin.invoicePembelians.edit', compact('customers', 'invoicePembelian', 'perusahaans'));
    }

    public function update(UpdateInvoicePembelianRequest $request, InvoicePembelian $invoicePembelian)
    {
        $invoicePembelian->update($request->all());

        return redirect()->route('admin.invoice-pembelians.index');
    }

    public function show(InvoicePembelian $invoicePembelian)
    {
        abort_if(Gate::denies('invoice_pembelian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $invoicePembelian->load('perusahaan', 'customer');

        return view('admin.invoicePembelians.show', compact('invoicePembelian'));
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
