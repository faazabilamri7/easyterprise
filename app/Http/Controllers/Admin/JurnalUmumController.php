<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyJurnalUmumRequest;
use App\Http\Requests\StoreJurnalUmumRequest;
use App\Http\Requests\UpdateJurnalUmumRequest;
use App\Models\Akun;
use App\Models\JurnalUmum;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class JurnalUmumController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('jurnal_umum_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = JurnalUmum::with(['akun'])->select(sprintf('%s.*', (new JurnalUmum())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'jurnal_umum_show';
                $editGate = 'jurnal_umum_edit';
                $deleteGate = 'jurnal_umum_delete';
                $crudRoutePart = 'jurnal-umums';

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

            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
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

        return view('admin.jurnalUmums.index');
    }

    public function create()
    {
        abort_if(Gate::denies('jurnal_umum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jurnalUmums.create', compact('akuns'));
    }

    public function store(StoreJurnalUmumRequest $request)
    {
        $jurnalUmum = JurnalUmum::create($request->all());

        return redirect()->route('admin.jurnal-umums.index');
    }

    public function edit(JurnalUmum $jurnalUmum)
    {
        abort_if(Gate::denies('jurnal_umum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jurnalUmum->load('akun');

        return view('admin.jurnalUmums.edit', compact('akuns', 'jurnalUmum'));
    }

    public function update(UpdateJurnalUmumRequest $request, JurnalUmum $jurnalUmum)
    {
        $jurnalUmum->update($request->all());

        return redirect()->route('admin.jurnal-umums.index');
    }

    public function show(JurnalUmum $jurnalUmum)
    {
        abort_if(Gate::denies('jurnal_umum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalUmum->load('akun');

        return view('admin.jurnalUmums.show', compact('jurnalUmum'));
    }

    public function destroy(JurnalUmum $jurnalUmum)
    {
        abort_if(Gate::denies('jurnal_umum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalUmum->delete();

        return back();
    }

    public function massDestroy(MassDestroyJurnalUmumRequest $request)
    {
        JurnalUmum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
