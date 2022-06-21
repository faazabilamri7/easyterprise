<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyChartOfAccountRequest;
use App\Http\Requests\StoreChartOfAccountRequest;
use App\Http\Requests\UpdateChartOfAccountRequest;
use App\Models\ChartOfAccount;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ChartOfAccountController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('chart_of_account_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ChartOfAccount::query()->select(sprintf('%s.*', (new ChartOfAccount())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'chart_of_account_show';
                $editGate = 'chart_of_account_edit';
                $deleteGate = 'chart_of_account_delete';
                $crudRoutePart = 'chart-of-accounts';

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
            $table->editColumn('account_code', function ($row) {
                return $row->account_code ? $row->account_code : '';
            });
            $table->editColumn('account_name', function ($row) {
                return $row->account_name ? $row->account_name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.chartOfAccounts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('chart_of_account_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.chartOfAccounts.create');
    }

    public function store(StoreChartOfAccountRequest $request)
    {
        $chartOfAccount = ChartOfAccount::create($request->all());

        return redirect()->route('admin.chart-of-accounts.index');
    }

    public function edit(ChartOfAccount $chartOfAccount)
    {
        abort_if(Gate::denies('chart_of_account_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.chartOfAccounts.edit', compact('chartOfAccount'));
    }

    public function update(UpdateChartOfAccountRequest $request, ChartOfAccount $chartOfAccount)
    {
        $chartOfAccount->update($request->all());

        return redirect()->route('admin.chart-of-accounts.index');
    }

    public function show(ChartOfAccount $chartOfAccount)
    {
        abort_if(Gate::denies('chart_of_account_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chartOfAccount->load('akunJurnalUmums', 'akunBukuBesars', 'akunNecaraSaldos', 'akunJurnalPenyelesaians');

        return view('admin.chartOfAccounts.show', compact('chartOfAccount'));
    }

    public function destroy(ChartOfAccount $chartOfAccount)
    {
        abort_if(Gate::denies('chart_of_account_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chartOfAccount->delete();

        return back();
    }

    public function massDestroy(MassDestroyChartOfAccountRequest $request)
    {
        ChartOfAccount::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
