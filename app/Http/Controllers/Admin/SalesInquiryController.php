<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySalesInquiryRequest;
use App\Http\Requests\StoreSalesInquiryRequest;
use App\Http\Requests\UpdateSalesInquiryRequest;
use App\Models\CrmCustomer;
use App\Models\Product;
use App\Models\SalesInquiry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SalesInquiryController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('sales_inquiry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SalesInquiry::with(['id_customer', 'nama_produk'])->select(sprintf('%s.*', (new SalesInquiry())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'sales_inquiry_show';
                $editGate = 'sales_inquiry_edit';
                $deleteGate = 'sales_inquiry_delete';
                $crudRoutePart = 'sales-inquiries';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('inquiry_kode', function ($row) {
                return $row->inquiry_kode ? $row->inquiry_kode : '';
            });

            $table->addColumn('id_customer_first_name', function ($row) {
                return $row->id_customer ? $row->id_customer->first_name : '';
            });

            $table->addColumn('nama_produk_name', function ($row) {
                return $row->nama_produk ? $row->nama_produk->name : '';
            });

            $table->editColumn('qty', function ($row) {
                return $row->qty ? $row->qty : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? SalesInquiry::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('catatan', function ($row) {
                return $row->catatan ? $row->catatan : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_customer', 'nama_produk']);

            return $table->make(true);
        }

        return view('admin.salesInquiries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sales_inquiry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nama_produks = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salesInquiries.create', compact('id_customers', 'nama_produks'));
    }

    public function store(StoreSalesInquiryRequest $request)
    {
        $salesInquiry = SalesInquiry::create($request->all());

        return redirect()->route('admin.sales-inquiries.index');
    }

    public function edit(SalesInquiry $salesInquiry)
    {
        abort_if(Gate::denies('sales_inquiry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $nama_produks = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salesInquiry->load('id_customer', 'nama_produk');

        return view('admin.salesInquiries.edit', compact('id_customers', 'nama_produks', 'salesInquiry'));
    }

    public function update(UpdateSalesInquiryRequest $request, SalesInquiry $salesInquiry)
    {
        $salesInquiry->update($request->all());

        return redirect()->route('admin.sales-inquiries.index');
    }

    public function show(SalesInquiry $salesInquiry)
    {
        abort_if(Gate::denies('sales_inquiry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInquiry->load('id_customer', 'nama_produk', 'inquiryRequestStockProducts', 'kodeInquirySalesQuotations');

        return view('admin.salesInquiries.show', compact('salesInquiry'));
    }

    public function destroy(SalesInquiry $salesInquiry)
    {
        abort_if(Gate::denies('sales_inquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesInquiry->delete();

        return back();
    }

    public function massDestroy(MassDestroySalesInquiryRequest $request)
    {
        SalesInquiry::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
