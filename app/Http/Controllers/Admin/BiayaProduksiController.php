<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBiayaProduksiRequest;
use App\Http\Requests\StoreBiayaProduksiRequest;
use App\Http\Requests\UpdateBiayaProduksiRequest;
use App\Models\BiayaProduksi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BiayaProduksiController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('biaya_produksi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BiayaProduksi::query()->select(sprintf('%s.*', (new BiayaProduksi())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'biaya_produksi_show';
                $editGate = 'biaya_produksi_edit';
                $deleteGate = 'biaya_produksi_delete';
                $crudRoutePart = 'biaya-produksis';

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

            $table->editColumn('periode', function ($row) {
                return $row->periode ? $row->periode : '';
            });
            $table->editColumn('desc', function ($row) {
                return $row->desc ? $row->desc : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.biayaProduksis.index');
    }

    public function create()
    {
        abort_if(Gate::denies('biaya_produksi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayaProduksis.create');
    }

    public function store(StoreBiayaProduksiRequest $request)
    {
        $biayaProduksi = BiayaProduksi::create($request->all());

        return redirect()->route('admin.biaya-produksis.index');
    }

    public function edit(BiayaProduksi $biayaProduksi)
    {
        abort_if(Gate::denies('biaya_produksi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayaProduksis.edit', compact('biayaProduksi'));
    }

    public function update(UpdateBiayaProduksiRequest $request, BiayaProduksi $biayaProduksi)
    {
        $biayaProduksi->update($request->all());

        return redirect()->route('admin.biaya-produksis.index');
    }

    public function show(BiayaProduksi $biayaProduksi)
    {
        abort_if(Gate::denies('biaya_produksi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayaProduksis.show', compact('biayaProduksi'));
    }

    public function destroy(BiayaProduksi $biayaProduksi)
    {
        abort_if(Gate::denies('biaya_produksi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayaProduksi->delete();

        return back();
    }

    public function massDestroy(MassDestroyBiayaProduksiRequest $request)
    {
        BiayaProduksi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
