<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAkunRequest;
use App\Http\Requests\StoreAkunRequest;
use App\Http\Requests\UpdateAkunRequest;
use App\Models\Akun;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AkunController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('akun_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Akun::query()->select(sprintf('%s.*', (new Akun())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'akun_show';
                $editGate = 'akun_edit';
                $deleteGate = 'akun_delete';
                $crudRoutePart = 'akuns';

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
            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });
            $table->editColumn('jenis_akun', function ($row) {
                return $row->jenis_akun ? $row->jenis_akun : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.akuns.index');
    }

    public function create()
    {
        abort_if(Gate::denies('akun_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.akuns.create');
    }

    public function store(StoreAkunRequest $request)
    {
        $akun = Akun::create($request->all());

        return redirect()->route('admin.akuns.index');
    }

    public function edit(Akun $akun)
    {
        abort_if(Gate::denies('akun_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.akuns.edit', compact('akun'));
    }

    public function update(UpdateAkunRequest $request, Akun $akun)
    {
        $akun->update($request->all());

        return redirect()->route('admin.akuns.index');
    }

    public function show(Akun $akun)
    {
        abort_if(Gate::denies('akun_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akun->load('akunJurnalUmums', 'akunBukuBesars', 'akunNecaraSaldos', 'akunJurnalPenyelesaians');

        return view('admin.akuns.show', compact('akun'));
    }

    public function destroy(Akun $akun)
    {
        abort_if(Gate::denies('akun_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akun->delete();

        return back();
    }

    public function massDestroy(MassDestroyAkunRequest $request)
    {
        Akun::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
