<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyVendorStatusRequest;
use App\Http\Requests\StoreVendorStatusRequest;
use App\Http\Requests\UpdateVendorStatusRequest;
use App\Models\VendorStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VendorStatusesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('vendor_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = VendorStatus::query()->select(sprintf('%s.*', (new VendorStatus())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'vendor_status_show';
                $editGate = 'vendor_status_edit';
                $deleteGate = 'vendor_status_delete';
                $crudRoutePart = 'vendor-statuses';

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

        return view('admin.vendorStatuses.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vendor_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vendorStatuses.create');
    }

    public function store(StoreVendorStatusRequest $request)
    {
        $vendorStatus = VendorStatus::create($request->all());

        return redirect()->route('admin.vendor-statuses.index');
    }

    public function edit(VendorStatus $vendorStatus)
    {
        abort_if(Gate::denies('vendor_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vendorStatuses.edit', compact('vendorStatus'));
    }

    public function update(UpdateVendorStatusRequest $request, VendorStatus $vendorStatus)
    {
        $vendorStatus->update($request->all());

        return redirect()->route('admin.vendor-statuses.index');
    }

    public function show(VendorStatus $vendorStatus)
    {
        abort_if(Gate::denies('vendor_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.vendorStatuses.show', compact('vendorStatus'));
    }

    public function destroy(VendorStatus $vendorStatus)
    {
        abort_if(Gate::denies('vendor_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendorStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyVendorStatusRequest $request)
    {
        VendorStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
