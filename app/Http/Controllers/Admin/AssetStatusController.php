<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetStatusRequest;
use App\Http\Requests\StoreAssetStatusRequest;
use App\Http\Requests\UpdateAssetStatusRequest;
use App\Models\AssetStatus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetStatuses = AssetStatus::all();

        return view('admin.assetStatuses.index', compact('assetStatuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetStatuses.create');
    }

    public function store(StoreAssetStatusRequest $request)
    {
        $assetStatus = AssetStatus::create($request->all());

        return redirect()->route('admin.asset-statuses.index');
    }

    public function edit(AssetStatus $assetStatus)
    {
        abort_if(Gate::denies('asset_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetStatuses.edit', compact('assetStatus'));
    }

    public function update(UpdateAssetStatusRequest $request, AssetStatus $assetStatus)
    {
        $assetStatus->update($request->all());

        return redirect()->route('admin.asset-statuses.index');
    }

    public function show(AssetStatus $assetStatus)
    {
        abort_if(Gate::denies('asset_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.assetStatuses.show', compact('assetStatus'));
    }

    public function destroy(AssetStatus $assetStatus)
    {
        abort_if(Gate::denies('asset_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetStatusRequest $request)
    {
        AssetStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
