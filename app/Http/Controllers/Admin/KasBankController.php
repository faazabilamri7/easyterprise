<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyKasBankRequest;
use App\Http\Requests\StoreKasBankRequest;
use App\Http\Requests\UpdateKasBankRequest;
use App\Models\KasBank;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KasBankController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('kas_bank_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = KasBank::query()->select(sprintf('%s.*', (new KasBank())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'kas_bank_show';
                $editGate = 'kas_bank_edit';
                $deleteGate = 'kas_bank_delete';
                $crudRoutePart = 'kas-banks';

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

            $table->editColumn('reff', function ($row) {
                return $row->reff ? $row->reff : '';
            });
            $table->editColumn('transaksi', function ($row) {
                return $row->transaksi ? $row->transaksi : '';
            });
            $table->editColumn('jumlah', function ($row) {
                return $row->jumlah ? $row->jumlah : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.kasBanks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kas_bank_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kasBanks.create');
    }

    public function store(StoreKasBankRequest $request)
    {
        $kasBank = KasBank::create($request->all());

        return redirect()->route('admin.kas-banks.index');
    }

    public function edit(KasBank $kasBank)
    {
        abort_if(Gate::denies('kas_bank_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.kasBanks.edit', compact('kasBank'));
    }

    public function update(UpdateKasBankRequest $request, KasBank $kasBank)
    {
        $kasBank->update($request->all());

        return redirect()->route('admin.kas-banks.index');
    }

    public function show(KasBank $kasBank)
    {
        abort_if(Gate::denies('kas_bank_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kasBank->load('kasBankTransaksiKeuangans');

        return view('admin.kasBanks.show', compact('kasBank'));
    }

    public function destroy(KasBank $kasBank)
    {
        abort_if(Gate::denies('kas_bank_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kasBank->delete();

        return back();
    }

    public function massDestroy(MassDestroyKasBankRequest $request)
    {
        KasBank::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
