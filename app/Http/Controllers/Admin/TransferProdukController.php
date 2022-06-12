<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTransferProdukRequest;
use App\Http\Requests\StoreTransferProdukRequest;
use App\Http\Requests\UpdateTransferProdukRequest;
use App\Models\Product;
use App\Models\QualityControl;
use App\Models\TransferProduk;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TransferProdukController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('transfer_produk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = TransferProduk::with(['id_quality_control', 'product_name'])->select(sprintf('%s.*', (new TransferProduk())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'transfer_produk_show';
                $editGate = 'transfer_produk_edit';
                $deleteGate = 'transfer_produk_delete';
                $crudRoutePart = 'transfer-produks';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_transfer_produk', function ($row) {
                return $row->id_transfer_produk ? $row->id_transfer_produk : '';
            });
            $table->addColumn('id_quality_control_id_quality_control', function ($row) {
                return $row->id_quality_control ? $row->id_quality_control->id_quality_control : '';
            });

            $table->addColumn('product_name_name', function ($row) {
                return $row->product_name ? $row->product_name->name : '';
            });

            $table->editColumn('qty', function ($row) {
                return $row->qty ? $row->qty : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? TransferProduk::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'id_quality_control', 'product_name']);

            return $table->make(true);
        }

        return view('admin.transferProduks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('transfer_produk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_quality_controls = QualityControl::pluck('id_quality_control', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_names = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transferProduks.create', compact('id_quality_controls', 'product_names'));
    }

    public function store(StoreTransferProdukRequest $request)
    {
        $transferProduk = TransferProduk::create($request->all());

        return redirect()->route('admin.transfer-produks.index');
    }

    public function edit(TransferProduk $transferProduk)
    {
        abort_if(Gate::denies('transfer_produk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $id_quality_controls = QualityControl::pluck('id_quality_control', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product_names = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transferProduk->load('id_quality_control', 'product_name');

        return view('admin.transferProduks.edit', compact('id_quality_controls', 'product_names', 'transferProduk'));
    }

    public function update(UpdateTransferProdukRequest $request, TransferProduk $transferProduk)
    {
        $transferProduk->update($request->all());

        return redirect()->route('admin.transfer-produks.index');
    }

    public function show(TransferProduk $transferProduk)
    {
        abort_if(Gate::denies('transfer_produk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transferProduk->load('id_quality_control', 'product_name');

        return view('admin.transferProduks.show', compact('transferProduk'));
    }

    public function destroy(TransferProduk $transferProduk)
    {
        abort_if(Gate::denies('transfer_produk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transferProduk->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransferProdukRequest $request)
    {
        TransferProduk::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
