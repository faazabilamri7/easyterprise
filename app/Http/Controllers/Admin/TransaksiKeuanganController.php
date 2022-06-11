<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTransaksiKeuanganRequest;
use App\Http\Requests\StoreTransaksiKeuanganRequest;
use App\Http\Requests\UpdateTransaksiKeuanganRequest;
use App\Models\KasBank;
use App\Models\SalesOrder;
use App\Models\TransaksiKeuangan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TransaksiKeuanganController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('transaksi_keuangan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TransaksiKeuangan::with(['kas_bank', 'sales_product'])->select(sprintf('%s.*', (new TransaksiKeuangan())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'transaksi_keuangan_show';
                $editGate = 'transaksi_keuangan_edit';
                $deleteGate = 'transaksi_keuangan_delete';
                $crudRoutePart = 'transaksi-keuangans';

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
            $table->addColumn('kas_bank_jumlah', function ($row) {
                return $row->kas_bank ? $row->kas_bank->jumlah : '';
            });

            $table->editColumn('desc', function ($row) {
                return $row->desc ? $row->desc : '';
            });
            $table->editColumn('nominal', function ($row) {
                return $row->nominal ? $row->nominal : '';
            });
            $table->editColumn('jenis_pembayaran', function ($row) {
                return $row->jenis_pembayaran ? $row->jenis_pembayaran : '';
            });
            $table->editColumn('qty', function ($row) {
                return $row->qty ? $row->qty : '';
            });
            $table->editColumn('harga_unit', function ($row) {
                return $row->harga_unit ? $row->harga_unit : '';
            });
            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : '';
            });
            $table->addColumn('sales_product_detail_order', function ($row) {
                return $row->sales_product ? $row->sales_product->detail_order : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'kas_bank', 'sales_product']);

            return $table->make(true);
        }

        return view('admin.transaksiKeuangans.index');
    }

    public function create()
    {
        abort_if(Gate::denies('transaksi_keuangan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kas_banks = KasBank::pluck('jumlah', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sales_products = SalesOrder::pluck('detail_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transaksiKeuangans.create', compact('kas_banks', 'sales_products'));
    }

    public function store(StoreTransaksiKeuanganRequest $request)
    {
        $transaksiKeuangan = TransaksiKeuangan::create($request->all());

        return redirect()->route('admin.transaksi-keuangans.index');
    }

    public function edit(TransaksiKeuangan $transaksiKeuangan)
    {
        abort_if(Gate::denies('transaksi_keuangan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kas_banks = KasBank::pluck('jumlah', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sales_products = SalesOrder::pluck('detail_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaksiKeuangan->load('kas_bank', 'sales_product');

        return view('admin.transaksiKeuangans.edit', compact('kas_banks', 'sales_products', 'transaksiKeuangan'));
    }

    public function update(UpdateTransaksiKeuanganRequest $request, TransaksiKeuangan $transaksiKeuangan)
    {
        $transaksiKeuangan->update($request->all());

        return redirect()->route('admin.transaksi-keuangans.index');
    }

    public function show(TransaksiKeuangan $transaksiKeuangan)
    {
        abort_if(Gate::denies('transaksi_keuangan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksiKeuangan->load('kas_bank', 'sales_product');

        return view('admin.transaksiKeuangans.show', compact('transaksiKeuangan'));
    }

    public function destroy(TransaksiKeuangan $transaksiKeuangan)
    {
        abort_if(Gate::denies('transaksi_keuangan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaksiKeuangan->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransaksiKeuanganRequest $request)
    {
        TransaksiKeuangan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
