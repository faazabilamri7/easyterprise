<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBukuBesarRequest;
use App\Http\Requests\StoreBukuBesarRequest;
use App\Http\Requests\UpdateBukuBesarRequest;
use App\Models\Akun;
use App\Models\BukuBesar;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BukuBesarController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('buku_besar_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BukuBesar::with(['akun'])->select(sprintf('%s.*', (new BukuBesar())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'buku_besar_show';
                $editGate = 'buku_besar_edit';
                $deleteGate = 'buku_besar_delete';
                $crudRoutePart = 'buku-besars';

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

            $table->addColumn('akun_nama', function ($row) {
                return $row->akun ? $row->akun->nama : '';
            });

            $table->editColumn('keterangan', function ($row) {
                return $row->keterangan ? $row->keterangan : '';
            });
            $table->editColumn('debit', function ($row) {
                return $row->debit ? $row->debit : '';
            });
            $table->editColumn('kredit', function ($row) {
                return $row->kredit ? $row->kredit : '';
            });
            $table->editColumn('total_debit', function ($row) {
                return $row->total_debit ? $row->total_debit : '';
            });
            $table->editColumn('total_kredit', function ($row) {
                return $row->total_kredit ? $row->total_kredit : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'akun']);

            return $table->make(true);
        }

        return view('admin.bukuBesars.index');
    }

    public function create()
    {
        abort_if(Gate::denies('buku_besar_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bukuBesars.create', compact('akuns'));
    }

    public function store(StoreBukuBesarRequest $request)
    {
        $bukuBesar = BukuBesar::create($request->all());

        return redirect()->route('admin.buku-besars.index');
    }

    public function edit(BukuBesar $bukuBesar)
    {
        abort_if(Gate::denies('buku_besar_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bukuBesar->load('akun');

        return view('admin.bukuBesars.edit', compact('akuns', 'bukuBesar'));
    }

    public function update(UpdateBukuBesarRequest $request, BukuBesar $bukuBesar)
    {
        $bukuBesar->update($request->all());

        return redirect()->route('admin.buku-besars.index');
    }

    public function show(BukuBesar $bukuBesar)
    {
        abort_if(Gate::denies('buku_besar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bukuBesar->load('akun');

        return view('admin.bukuBesars.show', compact('bukuBesar'));
    }

    public function destroy(BukuBesar $bukuBesar)
    {
        abort_if(Gate::denies('buku_besar_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bukuBesar->delete();

        return back();
    }

    public function massDestroy(MassDestroyBukuBesarRequest $request)
    {
        BukuBesar::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
