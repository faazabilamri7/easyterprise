<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyJurnalPenyelesaianRequest;
use App\Http\Requests\StoreJurnalPenyelesaianRequest;
use App\Http\Requests\UpdateJurnalPenyelesaianRequest;
use App\Models\Akun;
use App\Models\JurnalPenyelesaian;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class JurnalPenyelesaianController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('jurnal_penyelesaian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = JurnalPenyelesaian::with(['akun'])->select(sprintf('%s.*', (new JurnalPenyelesaian())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'jurnal_penyelesaian_show';
                $editGate = 'jurnal_penyelesaian_edit';
                $deleteGate = 'jurnal_penyelesaian_delete';
                $crudRoutePart = 'jurnal-penyelesaians';

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

        return view('admin.jurnalPenyelesaians.index');
    }

    public function create()
    {
        abort_if(Gate::denies('jurnal_penyelesaian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jurnalPenyelesaians.create', compact('akuns'));
    }

    public function store(StoreJurnalPenyelesaianRequest $request)
    {
        $jurnalPenyelesaian = JurnalPenyelesaian::create($request->all());

        return redirect()->route('admin.jurnal-penyelesaians.index');
    }

    public function edit(JurnalPenyelesaian $jurnalPenyelesaian)
    {
        abort_if(Gate::denies('jurnal_penyelesaian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jurnalPenyelesaian->load('akun');

        return view('admin.jurnalPenyelesaians.edit', compact('akuns', 'jurnalPenyelesaian'));
    }

    public function update(UpdateJurnalPenyelesaianRequest $request, JurnalPenyelesaian $jurnalPenyelesaian)
    {
        $jurnalPenyelesaian->update($request->all());

        return redirect()->route('admin.jurnal-penyelesaians.index');
    }

    public function show(JurnalPenyelesaian $jurnalPenyelesaian)
    {
        abort_if(Gate::denies('jurnal_penyelesaian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalPenyelesaian->load('akun');

        return view('admin.jurnalPenyelesaians.show', compact('jurnalPenyelesaian'));
    }

    public function destroy(JurnalPenyelesaian $jurnalPenyelesaian)
    {
        abort_if(Gate::denies('jurnal_penyelesaian_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jurnalPenyelesaian->delete();

        return back();
    }

    public function massDestroy(MassDestroyJurnalPenyelesaianRequest $request)
    {
        JurnalPenyelesaian::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
