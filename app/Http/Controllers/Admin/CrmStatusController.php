<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCrmStatusRequest;
use App\Http\Requests\StoreCrmStatusRequest;
use App\Http\Requests\UpdateCrmStatusRequest;
use App\Models\CrmStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CrmStatusController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('crm_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CrmStatus::query()->select(sprintf('%s.*', (new CrmStatus())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'crm_status_show';
                $editGate = 'crm_status_edit';
                $deleteGate = 'crm_status_delete';
                $crudRoutePart = 'crm-statuses';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.crmStatuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crm_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crmStatuses.create');
    }

    public function store(StoreCrmStatusRequest $request)
    {
        $crmStatus = CrmStatus::create($request->all());

        return redirect()->route('admin.crm-statuses.index');
    }

    public function edit(CrmStatus $crmStatus)
    {
        abort_if(Gate::denies('crm_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.crmStatuses.edit', compact('crmStatus'));
    }

    public function update(UpdateCrmStatusRequest $request, CrmStatus $crmStatus)
    {
        $crmStatus->update($request->all());

        return redirect()->route('admin.crm-statuses.index');
    }

    public function show(CrmStatus $crmStatus)
    {
        abort_if(Gate::denies('crm_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmStatus->load('statusCrmCustomers');

        return view('admin.crmStatuses.show', compact('crmStatus'));
    }

    public function destroy(CrmStatus $crmStatus)
    {
        abort_if(Gate::denies('crm_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmStatusRequest $request)
    {
        CrmStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
