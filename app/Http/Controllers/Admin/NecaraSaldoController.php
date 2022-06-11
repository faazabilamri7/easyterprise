<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyNecaraSaldoRequest;
use App\Http\Requests\StoreNecaraSaldoRequest;
use App\Http\Requests\UpdateNecaraSaldoRequest;
use App\Models\Akun;
use App\Models\NecaraSaldo;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class NecaraSaldoController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('necara_saldo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = NecaraSaldo::with(['akun'])->select(sprintf('%s.*', (new NecaraSaldo())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'necara_saldo_show';
                $editGate = 'necara_saldo_edit';
                $deleteGate = 'necara_saldo_delete';
                $crudRoutePart = 'necara-saldos';

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
            $table->editColumn('total', function ($row) {
                return $row->total ? $row->total : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'akun']);

            return $table->make(true);
        }

        return view('admin.necaraSaldos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('necara_saldo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.necaraSaldos.create', compact('akuns'));
    }

    public function store(StoreNecaraSaldoRequest $request)
    {
        $necaraSaldo = NecaraSaldo::create($request->all());

        return redirect()->route('admin.necara-saldos.index');
    }

    public function edit(NecaraSaldo $necaraSaldo)
    {
        abort_if(Gate::denies('necara_saldo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $akuns = Akun::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        $necaraSaldo->load('akun');

        return view('admin.necaraSaldos.edit', compact('akuns', 'necaraSaldo'));
    }

    public function update(UpdateNecaraSaldoRequest $request, NecaraSaldo $necaraSaldo)
    {
        $necaraSaldo->update($request->all());

        return redirect()->route('admin.necara-saldos.index');
    }

    public function show(NecaraSaldo $necaraSaldo)
    {
        abort_if(Gate::denies('necara_saldo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $necaraSaldo->load('akun');

        return view('admin.necaraSaldos.show', compact('necaraSaldo'));
    }

    public function destroy(NecaraSaldo $necaraSaldo)
    {
        abort_if(Gate::denies('necara_saldo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $necaraSaldo->delete();

        return back();
    }

    public function massDestroy(MassDestroyNecaraSaldoRequest $request)
    {
        NecaraSaldo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
