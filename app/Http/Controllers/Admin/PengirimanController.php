<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPengirimanRequest;
use App\Http\Requests\StorePengirimanRequest;
use App\Http\Requests\UpdatePengirimanRequest;
use App\Models\Pengiriman;
use App\Models\SalesOrder;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PengirimanController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('pengiriman_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pengiriman::with(['no_sales_order'])->select(sprintf('%s.*', (new Pengiriman())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'pengiriman_show';
                $editGate = 'pengiriman_edit';
                $deleteGate = 'pengiriman_delete';
                $crudRoutePart = 'pengirimen';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id_pengiriman', function ($row) {
                return $row->id_pengiriman ? $row->id_pengiriman : '';
            });
            $table->addColumn('no_sales_order_no_sales_order', function ($row) {
                return $row->no_sales_order ? $row->no_sales_order->no_sales_order : '';
            });

            $table->editColumn('status_pengiriman', function ($row) {
                return $row->status_pengiriman ? Pengiriman::STATUS_PENGIRIMAN_SELECT[$row->status_pengiriman] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'no_sales_order']);

            return $table->make(true);
        }

        return view('admin.pengirimen.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pengiriman_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $no_sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pengirimen.create', compact('no_sales_orders'));
    }

    public function store(StorePengirimanRequest $request)
    {
        $pengiriman = Pengiriman::create($request->all());

        return redirect()->route('admin.pengirimen.index');
    }

    public function edit(Pengiriman $pengiriman)
    {
        abort_if(Gate::denies('pengiriman_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $no_sales_orders = SalesOrder::pluck('no_sales_order', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pengiriman->load('no_sales_order');

        return view('admin.pengirimen.edit', compact('no_sales_orders', 'pengiriman'));
    }

    public function update(UpdatePengirimanRequest $request, Pengiriman $pengiriman)
    {
        $pengiriman->update($request->all());

        return redirect()->route('admin.pengirimen.index');
    }

    public function show(Pengiriman $pengiriman)
    {
        abort_if(Gate::denies('pengiriman_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengiriman->load('no_sales_order');

        return view('admin.pengirimen.show', compact('pengiriman'));
    }

    public function destroy(Pengiriman $pengiriman)
    {
        abort_if(Gate::denies('pengiriman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengiriman->delete();

        return back();
    }

    public function massDestroy(MassDestroyPengirimanRequest $request)
    {
        Pengiriman::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
