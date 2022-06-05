<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVendorStatusRequest;
use App\Http\Requests\StoreVendorStatusRequest;
use App\Http\Requests\UpdateVendorStatusRequest;
use App\Models\VendorStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VendorStatusesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('vendor_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vendorStatuses = VendorStatus::all();

        return view('frontend.vendorStatuses.index', compact('vendorStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('vendor_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.vendorStatuses.create');
    }

    public function store(StoreVendorStatusRequest $request)
    {
        $vendorStatus = VendorStatus::create($request->all());

        return redirect()->route('frontend.vendor-statuses.index');
    }

    public function edit(VendorStatus $vendorStatus)
    {
        abort_if(Gate::denies('vendor_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.vendorStatuses.edit', compact('vendorStatus'));
    }

    public function update(UpdateVendorStatusRequest $request, VendorStatus $vendorStatus)
    {
        $vendorStatus->update($request->all());

        return redirect()->route('frontend.vendor-statuses.index');
    }

    public function show(VendorStatus $vendorStatus)
    {
        abort_if(Gate::denies('vendor_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.vendorStatuses.show', compact('vendorStatus'));
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
